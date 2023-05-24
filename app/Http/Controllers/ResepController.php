<?php

namespace App\Http\Controllers;

use App\Models\DetailResep;
use App\Models\Resep;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function index(int $noresep, $noreg)
    {
       $resep = Resep::where($noreg, 'NOREG')->get();
       $detailresep = DetailResep::where($noresep,'NORESEP')->get();
       return view('laporan.resep',compact('resep','detailresep'));
    }
}
