<?php

namespace App\Http\Controllers;

use App\Models\AnamnesaRajal;
use App\Models\DetailResep;
use App\Models\HasilLab;
use App\Models\Icd;
use App\Models\Pasien;
use App\Models\Regdr;
use App\Models\Registrasi;
use App\Models\Resep;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $pasien = Pasien::when($request->nopasien != NULL, function ($q) use ($request) {
            $q->where('NOPASIEN', $request->nopasien);
        })
            ->when($request->namapasien != NULL, function ($q) use ($request) {
                $q->where('NAMAPASIEN', 'LIKE', '%' . $request->namapasien . '%');
            })
            ->when($request->tlppasien != NULL, function ($q) use ($request) {
                $q->where('TLPPASIEN', 'LIKE', '%' . $request->tlppasien . '%');
            })
            ->where('NOPASIEN', '<>', '-')->whereNotNull('NAMAPASIEN')->where('NAMAPASIEN', '<>', '-')
            ->where('NOPASIEN','NOT LIKE','%R%')
            ->where('NOPASIEN','NOT LIKE','%P%')
            ->orderBy('nopasien', 'asc')->paginate();
        return view('pasien.index', compact('pasien'));
    }

    // public function cari(Request $request)
    // {
    //     $pasien = Pasien::when($request->nopasien != NULL, function ($q) use ($request) {
    //         $q->where('NOPASIEN', $request->nopasien);
    //     })
    //         ->when($request->namapasien != NULL, function ($q) use ($request) {
    //             $q->where('NAMAPASIEN', 'LIKE', '%' . $request->namapasien . '%');
    //         })
    //         ->when($request->tlppasien != NULL, function ($q) use ($request) {
    //             $q->where('TLPPASIEN', 'LIKE', '%' . $request->tlppasien . '%');
    //         })
    //         ->where('NOPASIEN', '<>', '-')->whereNotNull('NAMAPASIEN')->where('NAMAPASIEN', '<>', '-')
    //         ->where('NOPASIEN','NOT LIKE','%R%')
    //         ->where('NOPASIEN','NOT LIKE','%P%')
    //         ->orderBy('nopasien', 'asc')->paginate(50);
    //     return view('pasien.index', compact('pasien'));
    // }

    public function show(string $nopasien)
    {
        $pasien = Pasien::where('NOPASIEN', $nopasien)->first();
        $registrasi = Registrasi::where('NOPASIEN', $nopasien)->first();
        $resep = Resep::where('NOREG', $registrasi->NOREG)->get();
        $hasillab = HasilLab::select('NOLAB')
            ->where('NOREG', $registrasi->NOREG)
            ->groupBy('NOLAB')
            ->get();
        foreach ($hasillab as $key => $value) {
            $child = HasilLab::select('*')->where('NOLAB', $value->NOLAB)->get();
            $hasillab[$key]->child = $child;
        }
        // dd($resep);
        if ($pasien) {
            return view('pasien.view', compact('pasien', 'registrasi', 'hasillab', 'resep'));
        } else {
            return redirect()->back()->with('message', 'Tidak ada data pasien ditemukan');
        }
    }

    public function registrasi(int $noreg, string $nopasien)
    {
        $registrasi = Registrasi::where('NOPASIEN', $nopasien)->orderBy($noreg, 'DESC')->get();
        return view('pasien.view', compact('registrasi'));
    }

    public function riwayat(string $nopasien, string $noreg)
    {
        $pasien = Pasien::where('NOPASIEN', $nopasien)->first();
        $hasillab = HasilLab::select('NOLAB')->where('NOREG', $noreg)->groupBy('NOLAB')->get();
        foreach ($hasillab as $key => $value) {
            $child = HasilLab::select('*')->where('NOLAB', $value->NOLAB)->get();
            $hasillab[$key]->child = $child;
        }
        // return $hasillab;

        $resep = Resep::where('noreg', $noreg)->orderBy('NORESEP', 'ASC')->get();
        $anamnesa = AnamnesaRajal::where('noreg', $noreg)->get();
        $icd = Icd::where('noreg', $noreg)->get();
        $riwayat = Registrasi::where('NOREG', $noreg)->where('NOPASIEN', $nopasien)->first();

        if ($riwayat) {
            return view('pasien.riwayat', compact('pasien', 'riwayat', 'hasillab', 'resep', 'anamnesa', 'icd'));
        } else {
            return redirect()->back()->with('message', 'Tidak ditemukan data');
        }
    }
}
