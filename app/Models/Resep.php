<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv2';
    protected $table = 'TRPMN';
    // protected $primaryKey = 'NORESEP';
    protected $guarded = [];

    public function detailresep()
    {
        return $this->hasMany(DetailResep::class,'NORESEP','NORESEP');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class,'KODEDR','KODEDOKTER');
    }

}
