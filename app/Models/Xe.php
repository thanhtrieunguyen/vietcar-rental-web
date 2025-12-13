<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Xe extends Model
{
    protected $table = 'xe';
    protected $primaryKey = 'idxe';

    protected $guarded = [];

    public function dongXe()
    {
        return $this->belongsTo('App\Models\DongXe', 'iddongxe', 'iddongxe');
    }

    public function hangXe()
    {
        return $this->belongsTo('App\Models\HangXe', 'idhangxe', 'idhangxe');
    }

    public function hinhXe()
    {
        return $this->belongsTo('App\Models\HinhXe', 'idhinhxe', 'idhinhxe');
    }

    public function giaodiches()
    {
        return $this->hasMany('App\Models\GiaoDich', 'idxe', 'idxe');
    }

    public function hoaDons()
    {
        return $this->hasMany('App\Models\HoaDon', 'idxe', 'idxe');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'idxe', 'idxe');
    }

}
