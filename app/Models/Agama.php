<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;
    protected $connection ='sqlsrv2';
    protected $table = 'agama';
    protected $guarded=[];

}
