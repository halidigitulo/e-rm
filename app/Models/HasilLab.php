<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilLab extends Model
{
    use HasFactory;
    protected $connection ='sqlsrv2';
    protected $table = 'trxhasil';
    protected $primaryKey='rowhasil';
    protected $guarded=[];

    public function unit()
    {
        return $this->belongsTo(Unit::class,'KODEBAGIAN','KODEBAGIAN');
    }

    public function dokter()
    {
        // return $this->belongsTo(Model-Tujuan::class,'PK_UTAMA','PK_TUJUAN')
        return $this->belongsTo(Dokter::class,'KODEDR','KODEDOKTER');
    }
}
