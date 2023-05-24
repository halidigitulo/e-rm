<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HarapanPasien extends Model
{
    use HasFactory;
    protected $connection ='sqlsrv';
    protected $table = 'harapan_pasiens';
    protected $guarded=[];

    public function registrasi()
    {
        return $this->belongsTo(Registrasi::class,'noreg','NOREG');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
