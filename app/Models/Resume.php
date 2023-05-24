<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'resumes';
    protected $guarded = [];

    public function registrasi()
    {
        return $this->belongsTo(Registrasi::class,'noreg','NOREG');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function diagnosa()
    {
        return $this->belongsTo(Icd::class,'kode_diagnosa_utama','kddiagnosa');
    }

    public function diagnosa_sekunder()
    {
        return $this->belongsToMany('App\Models\Icd');
    }
}
