<?php

namespace App\Http\Controllers;

use App\Models\Regdr;
use App\Models\Registrasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $ranap = Registrasi::
            // select('REGPAS.NOREG', 'REGPAS.NOPASIEN as NORM', 'PASIEN.NAMAPASIEN as NAMA', 'BAGIAN.NAMABAGIAN as RUANGAN', 'KMRTT.NOKAMAR as KAMAR', 'KMRTT.NOTT as TT', 'DOKTER.NAMADOKTER as DPJP', 'PT.NAMAPT as PENJAMIN', 'PASIEN.TGLLAHIR', 'PASIEN.KOTAPAS', 'PASIEN.KECPAS', 'PASIEN.KLRHPAS', 'PASIEN.ALM1PASIEN as ALAMAT', 'PASIEN.TLPPASIEN', 'REGPAS.TGLREG as TGLMASUK')
            join('REGDR', 'REGPAS.NOREG', '=', 'REGDR.NOREG')
            ->join('REGRWI', 'REGPAS.NOREG', '=', 'REGRWI.NOREG')
            // ->join('PASIEN',
            // function ($leftjoin) {
            //     $leftjoin->on('PASIEN.NOPASIEN', '=', 'KELPAS.NOPASIEN');
            // },'KELPAS','REGPAS.NOPASIEN', '=', 'PASIEN.NOPASIEN')
            //     ->leftjoin('KELPAS','PASIEN.NOPASIEN ','=','KELPAS.NOPASIEN ')
            // ->join('KELPAS', 'REGPAS.NOPASIEN', '=', 'PASIEN.NOPASIEN')
            ->join('BAGIAN', 'REGRWI.KODEBAGIAN', '=', 'BAGIAN.KODEBAGIAN')
            ->join('PT', 'REGPAS.KODEPT', '=', 'PT.KODEPT')
            ->join('KMRTT', 'REGRWI.NOREG', '=', 'KMRTT.NOTRANS')
            ->join('DOKTER', 'REGDR.KODEDOKTER', '=', 'DOKTER.KODEDOKTER')
            ->where('REGDR.BAGREGDR', 'LIKE', '%' . '93' . '%')
            ->where('REGRWI.STSPULANG', '=', 'I')
            ->where('REGPAS.VALIDRI', '!=', 'V')
            ->where('REGDR.NOINVOICE', NULL)->get();
        // dd($ranap);
        $today = Carbon::now()->format('m-d-Y');
        // dd($today);
        $rajal = Registrasi::
        select('REGPAS.NOREG AS NOREG', 'PASIEN.NAMAPASIEN AS PASIEN', 'BAGIAN.NAMABAGIAN AS POLI', 'PT.NAMAPT AS PENJAMIN', 'REGPAS.NOPASIEN AS NORM','PASIEN.JNSKELAMIN','PASIEN.ALM1PASIEN','REGDR.KODEDOKTER')
            ->join('PASIEN', 'REGPAS.NOPASIEN', '=', 'PASIEN.NOPASIEN')
            ->join('PT', 'REGPAS.KODEPT', '=', 'PT.KODEPT')
            ->join('REGDR', 'REGPAS.NOREG', '=', 'REGDR.NOREG')
            ->join('BAGIAN', 'BAGIAN.KODEBAGIAN', '=', 'REGDR.BAGREGDR')
            ->where('REGDR.BAGREGDR', 'LIKE', '%' . '91' . '%')
            ->where('REGPAS.TGLREG', $today)
            ->get();

        $igd = Registrasi::select('REGPAS.NOREG AS NOREG', 'PASIEN.NAMAPASIEN AS PASIEN',  'PT.NAMAPT AS PENJAMIN', 'REGPAS.NOPASIEN AS NORM', 'PASIEN.JNSKELAMIN','PASIEN.ALM1PASIEN')
            // ->from('REGDR')
            ->join('PASIEN', 'REGPAS.NOPASIEN', '=', 'PASIEN.NOPASIEN')
            ->join('PT', 'REGPAS.KODEPT', '=', 'PT.KODEPT')
            ->join('REGDR', 'REGPAS.NOREG', '=', 'REGDR.NOREG')
            ->join('BAGIAN', 'BAGIAN.KODEBAGIAN', '=', 'REGDR.BAGREGDR')
            ->where('REGDR.BAGREGDR', 'LIKE', '%' . '95' . '%')
            ->where('REGPAS.TGLREG', $today)
            // ->groupBy('REGPAS.TGLREG')
            ->get();
        // dd($igd);

        $baru = Registrasi::select('NOREG AS TOTAL')
            ->where('TGLREG', $today)
            ->where('BARULAMA', '=', 'B')
            ->groupBy('BARULAMA')
            ->count();

        $lama = Registrasi::select('NOREG AS TOTAL')
            ->where('TGLREG', $today)
            ->where('BARULAMA', '=', 'L')
            ->groupBy('BARULAMA')
            ->count();

        $lab = Registrasi::SELECT('PASIEN.NOPASIEN AS NORM', 'PASIEN.NAMAPASIEN AS PASIEN', 'REGPAS.NOREG', 'BAGIAN.NAMABAGIAN AS UNIT', 'DOKTER.NAMADOKTER AS DPJP', 'PT.NAMAPT AS PENJAMIN','PASIEN.JNSKELAMIN','PASIEN.ALM1PASIEN')
            ->from('REGDR')
            ->join('REGPAS', 'REGDR.NOREG', '=', 'REGPAS.NOREG')
            ->join('TRXORDER', 'REGDR.NOREG', '=', 'TRXORDER.NOREG')
            ->join('PASIEN', 'REGPAS.NOPASIEN', '=', 'PASIEN.NOPASIEN')
            ->join('BAGIAN', 'REGDR.BAGREGDR', '=', 'BAGIAN.KODEBAGIAN')
            ->join('DOKTER', 'REGDR.KODEDOKTER', '=', 'DOKTER.KODEDOKTER')
            ->join('PT', 'REGPAS.KODEPT', '=', 'PT.KODEPT')
            ->WHERE('TRXORDER.UNITTUJUAN', '=', '9401')
            ->where('TRXORDER.TGLORDER', $today)->get();

        $rad = Registrasi::SELECT('PASIEN.NOPASIEN AS NORM', 'PASIEN.NAMAPASIEN AS PASIEN', 'REGPAS.NOREG', 'BAGIAN.NAMABAGIAN AS UNIT', 'DOKTER.NAMADOKTER AS DPJP', 'PT.NAMAPT AS PENJAMIN','PASIEN.JNSKELAMIN','PASIEN.ALM1PASIEN')
        ->from('REGDR')
        ->join('REGPAS', 'REGDR.NOREG', '=', 'REGPAS.NOREG')
        ->join('TRXORDER', 'REGDR.NOREG', '=', 'TRXORDER.NOREG')
        ->join('PASIEN', 'REGPAS.NOPASIEN', '=', 'PASIEN.NOPASIEN')
        ->join('BAGIAN', 'REGDR.BAGREGDR', '=', 'BAGIAN.KODEBAGIAN')
        ->join('DOKTER', 'REGDR.KODEDOKTER', '=', 'DOKTER.KODEDOKTER')
        ->join('PT', 'REGPAS.KODEPT', '=', 'PT.KODEPT')
        ->WHERE('TRXORDER.UNITTUJUAN', '=', '9402')
        ->where('TRXORDER.TGLORDER', $today)->get();

        return view('dashboard', compact('rajal', 'igd', 'baru', 'lama', 'ranap', 'lab', 'rad'));
    }
}
