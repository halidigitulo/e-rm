<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $connection ='sqlsrv2';
    protected $table = 'dokter';
    // protected $primaryKey = 'KODEDOKTER';
    protected $guarded=[];

    public function ppa()
    {
        return $this->belongsTo(Ppa::class,'KODEDOKTER','kode_ppa');
    }
}
