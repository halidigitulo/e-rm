<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TriageIgdTerapi extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'triage_igd_terapis';
    protected $guarded=[];

}
