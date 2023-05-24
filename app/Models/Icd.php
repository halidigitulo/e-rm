<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icd extends Model
{
    use HasFactory;
    protected $connection ='sqlsrv';
    protected $table = 'icd10';
    protected $guarded=[];
}
