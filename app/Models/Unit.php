<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $connection ='sqlsrv2';
    protected $table = 'bagian';
    protected $primaryKey = 'KODEBAGIAN';
    protected $guarded=[];
}