<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regdr extends Model
{
    use HasFactory;
    protected $connection ='sqlsrv2';
    protected $table = 'regdr';
    // protected $primaryKey ='NOREGDR';
    protected $guarded=[];

    public function unit()
    {
        return $this->belongsTo(Unit::class,'BAGREGDR','KODEBAGIAN');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class,'KODEDOKTER','KODEDOKTER');
    }

    public function registrasi()
    {
        return $this->belongsToMany(Registrasi::class,'NOREG','NOREG');
    }
}
