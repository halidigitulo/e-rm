<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranap extends Model
{
    use HasFactory;
    protected $connection ='sqlsrv2';
    protected $table = 'REGRWI';
    protected $guarded=[];

    public function regdr()
    {
        return $this->belongsTo(Regdr::class,'NOREG','NOREG');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class,'KODEBAGIAN','KODEBAGIAN');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class,'PASIENDR','KODEDOKTER');
    }
}
