<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radiologi extends Model
{
    use HasFactory;
    protected $connection ='sqlsrv';
    protected $table = 'radiologis';
    protected $guarded=[];

    public function registrasi()
    {
        return $this->belongsTo(Registrasi::class,'noreg','NOREG');
    }

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class,'kodepmr','KODEPMR');
    }

    public function dokter_kirim()
    {
        return $this->belongsTo(Ppa::class,'kodedokter_kirim','kode_ppa');
    }

    public function dokter_periksa()
    {
        return $this->belongsTo(Dokter::class,'kodedokter_periksa','KODEDOKTER');
    }
}
