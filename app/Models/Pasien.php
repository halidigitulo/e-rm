<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pasien extends Model
{
    use HasFactory;
    protected $connection ='sqlsrv2';
    protected $table = 'pasien';
    // protected $primaryKey = 'NOPASIEN';
    protected $guarded=[];

    public function agama()
    {
        return $this->belongsTo(Agama::class,'KODEAGAMA','KODEAGAMA');
    }

    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class,'KODEDIDIK','KODEDIDIK');
    }

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class,'PEKERJAAN','KDPKRJAAN');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class,'UNITAKHRS','KODEBAGIAN');
    }

    public function registrasi()
    {
        return $this->hasMany(Registrasi::class,'NOPASIEN','NOPASIEN');
    }

}
