<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;
    protected $connection ='sqlsrv2';
    protected $table = 'REGPAS';
    // protected $primaryKey = 'NOREG';
    protected $guarded=[];

    // relasi ke table REGRWI / ranap
    public function ranap()
    {
        return $this->belongsTo(Ranap::class,'NOREG','NOREG');
    }

    // relasi ke table bagian / unit untuk keperluan kunjungan terkahir
    public function unit()
    {
        return $this->belongsTo(Unit::class,'UNITAKHRS','KODEBAGIAN');
    }

    // relasi ke table perusahaan / PT
    public function perusahaan()
    {
        return $this->belongsTo(Penjamin::class,'KODEPT','KODEPT');
    }

    public function bagian()
    {
        return $this->belongsTo(Regdr::class,'NOREG','NOREG');
    }

    // relasi ke table RJUMUM untuk keperluan laporan anamnesa rajal dll
    public function anamnesarajal()
    {
        return $this->belongsTo(AnamnesaRajal::class,'NOREG','NOREG');
    }

    // relasi ke table pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class,'NOPASIEN','NOPASIEN');
    }

    // relasi ke table TRXHASIl / hasil laboratorium
    public function hasillab()
    {
        return $this->belongsTo(HasilLab::class,'NOREG','NOREG');
    }

    // relasi ke table TRPMN / resep
    public function resep()
    {
        return $this->belongsTo(Resep::class,'NOREG','NOREG');
        // return $this->hasMany(Resep::class,'NOREG','NOREG');
    }

    // relasi ke table ICDPAS / table ICD
    public function icd()
    {
        return $this->belongsTo(Icd::class,'NOREG','NOREG');
    }

    public function radiologi()
    {
        return $this->belongsTo(Radiologi::class,'NOREG','noreg');
    }

    public function triage()
    {
        return $this->belongsTo(TriageIgd::class,'noreg','NOREG');
    }
}
