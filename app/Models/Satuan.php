<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv2';
    protected $table = 'SATBAR';
    protected $guarded = [];
}
