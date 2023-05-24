<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeTerapi extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'resume_terapis';
    protected $guarded = [];
}
