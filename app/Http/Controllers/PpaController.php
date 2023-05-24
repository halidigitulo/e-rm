<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Ppa;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PpaController extends Controller
{
    public function index()
    {
        $ppa = Ppa::all();
        $dokter = Dokter::all();
        return view('ppa.index', compact('ppa', 'dokter'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_ppa' => 'required|min:3',
            'nama_ppa' => 'required',
            'jenis_ppa' => 'required',
        ]);

        $ppa = Ppa::create([
            'kode_ppa' => $request->kode_ppa,
            'nama_ppa' => $request->nama_ppa,
            'jenis_ppa' => $request->jenis_ppa,
        ]);
        flash()->success('Selamat', 'Data berhasil ditambahkan');
        return redirect()->route('ppa.index');
    }

    public function qrcode($id)
    {
        $data = Ppa::findOrFail($id);
        // $qrcode = QRcode::size(400)->generate($data->nama_ppa)->merge(public_path('/rshk-logo.png'), .3, true)->format('png');
        $qrcode = QrCode::format('png')
                         ->merge(public_path('/rshk-logo.png'), 0.5, true)
                         ->size(500)
                         ->errorCorrection('H')
                         ->generate('$data->nama_ppa');
        
        return view('ppa.qrcode', compact('qrcode'));
    }
}
