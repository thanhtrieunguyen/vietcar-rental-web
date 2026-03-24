<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Support\Facades\DB;

class DemoResetDatabase extends Command
{
    use ConfirmableTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:reset-db
                            {--file=hkqi@991##.sql : Relative path to SQL snapshot}
                            {--force : Force execution in production}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset demo database by re-importing SQL snapshot';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        if (! $this->confirmToProceed()) {
            return self::FAILURE;
        }

        $filePath = base_path($this->option('file'));

        if (! is_file($filePath)) {
            $this->error("Không tìm thấy file SQL: {$filePath}");

            return self::FAILURE;
        }

        $this->info('Bắt đầu reset database demo...');
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            $this->dropAllTables();
        } catch (\Throwable $exception) {
            $this->error('Lỗi khi xóa dữ liệu cũ: '.$exception->getMessage());

            return self::FAILURE;
        } finally {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }

        try {
            $this->importSqlFile($filePath);
        } catch (\Throwable $exception) {
            $this->error('Lỗi khi import file SQL: '.$exception->getMessage());

            return self::FAILURE;
        }

        $this->info('Reset database thành công.');

        return self::SUCCESS;
    }

    private function dropAllTables(): void
    {
        $tables = DB::select('SHOW FULL TABLES WHERE Table_type = "BASE TABLE"');

        foreach ($tables as $table) {
            $tableName = (string) array_values((array) $table)[0];
            DB::statement("DROP TABLE IF EXISTS `{$tableName}`");
        }
    }

    private function importSqlFile(string $filePath): void
    {
        $handle = fopen($filePath, 'r');

        if ($handle === false) {
            throw new \RuntimeException('Không thể mở file SQL để đọc.');
        }

        $statement = '';

        while (($line = fgets($handle)) !== false) {
            $trimmed = trim($line);

            if ($trimmed === '') {
                continue;
            }

            if (str_starts_with($trimmed, '--')) {
                continue;
            }

            if (str_starts_with($trimmed, '/*') && ! str_starts_with($trimmed, '/*!')) {
                continue;
            }

            $statement .= $line;

            if (preg_match('/;\s*$/', $trimmed) === 1) {
                DB::unprepared($statement);
                $statement = '';
            }
        }

        fclose($handle);

        if (trim($statement) !== '') {
            DB::unprepared($statement);
        }
    }
}
