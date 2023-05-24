<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailResep extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv2';
    protected $table = 'TRPDN';
    // protected $primaryKey = 'NORESEP';
    protected $guarded = [];

    public function barang()
    {
        return $this->belongsTo(Barang::class,'KODEBARANG','KODEBARANG');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class,'SATRSP','KODESM');
    }

    public function aturanpakai()
    {
        return $this->belongsTo(AturanPakai::class,'KODEATRPK','KODEATRPK');
    }
}
