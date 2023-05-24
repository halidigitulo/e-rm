<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeDiagnosaSekunder extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'resume_diagnosa_sekunders';
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
        return $this->belongsTo(Icd10::class,'kode_diagnosa','kddiagnosa');
    }
}
