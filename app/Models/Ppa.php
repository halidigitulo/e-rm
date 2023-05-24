<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppa extends Model
{
    use HasFactory;
    protected $connection ='sqlsrv';
    protected $table = 'ppas';
    protected $guarded=[];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class,'kode_ppa','KODEDOKTER');
    }
}
