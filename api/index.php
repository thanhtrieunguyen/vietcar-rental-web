<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->call('config:clear');
$kernel->call('cache:clear');
$kernel->call('config:cache');

// Gọi entrypoint chính thức của Laravel
require __DIR__ . '/../public/index.php';
