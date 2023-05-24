<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TriageIgd extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'triage_igd';
    protected $guarded = [];

    public function registrasi()
    {
        return $this->belongsTo(Registrasi::class,'noreg','NOREG');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function ttdTerapis()
    {
        return $this->hasMany(TriageIgdTerapi::class,'triage_igd_id','id');
    }

    public function kies()
    {
        return $this->belongsToMany(Kie::class);
    }
}