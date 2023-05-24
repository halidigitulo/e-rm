<?php

namespace App\Http\Controllers\f1;

use App\Http\Controllers\Controller;
use App\Models\HarapanPasien;
use App\Models\Registrasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HarapanPasienController extends Controller
{
    public function index()
    {
        $harapan = HarapanPasien::orderBy('created_at', 'DESC')->get();
        return view('f1.harapanpasien.index', compact('harapan'));
    }

    public function create()
    {
        $noreg = Registrasi::join('REGDR', 'REGPAS.NOREG', '=', 'REGDR.NOREG')
            ->join('REGRWI', 'REGPAS.NOREG', '=', 'REGRWI.NOREG')
            ->join('BAGIAN', 'REGRWI.KODEBAGIAN', '=', 'BAGIAN.KODEBAGIAN')
            ->join('PT', 'REGPAS.KODEPT', '=', 'PT.KODEPT')
            ->join('KMRTT', 'REGRWI.NOREG', '=', 'KMRTT.NOTRANS')
            ->join('DOKTER', 'REGDR.KODEDOKTER', '=', 'DOKTER.KODEDOKTER')
            ->where('REGDR.BAGREGDR', 'LIKE', '%' . '93' . '%')
            ->where('REGRWI.STSPULANG', '=', 'I')
            ->where('REGPAS.VALIDRI', '!=', 'V')
            ->where('REGDR.NOINVOICE', NULL)->get();
        return view('f1.harapanpasien.create', compact('noreg'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'noreg' => 'required',
            'signed_pj' => 'required'
        ]);

        if ($request->has('signed_pj')) {
            $folderPath = public_path('uploads/harapanpasien/');
            $image_parts = explode(";base64,", $request->signed_pj);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . uniqid() . '.' . $image_type;
            file_put_contents($file, $image_base64);
            $harapan = HarapanPasien::create([
                'noreg' =>  $request->noreg,
                'pj_nama' => $request->nama,
                'pj_tempatlahir' => $request->tempatlahir,
                'pj_tgllahir' => $request->tgllahir,
                'pj_hp' => $request->nohp,
                'harapan' => $request->harapan,
                'pj_paraf'  =>  $request->signed_pj,
                'user_id' => Auth::id(),
            ]);

            flash()->success('Selamat', 'Data berhasil disimpan');
            return redirect()->route('harapanpasien.index');
        }
    }

    public function edit(string $noreg)
    {
        $harapan = HarapanPasien::where('noreg', $noreg)->first();
        return view('f1.harapanpasien.edit', compact('harapan'));
    }

    public function update(Request $request, HarapanPasien $harapanpasien)
    {
        $this->validate($request, [
            'noreg' => 'required',
            'signed_pj' => 'required'
        ]);

        if ($request->has('signed_pj')) {
            $folderPath = public_path('uploads/harapanpasien/');
            $image_parts = explode(";base64,", $request->signed_pj);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . uniqid() . '.' . $image_type;
            file_put_contents($file, $image_base64);

            $harapanpasien_data = [
                'noreg' =>  $request->noreg,
                'pj_nama' => $request->nama,
                'pj_tempatlahir' => $request->tempatlahir,
                'pj_tgllahir' => $request->tgllahir,
                'pj_hp' => $request->nohp,
                'harapan' => $request->harapan,
                'pj_paraf'  =>  $request->signed_pj,
                'user_id' => Auth::id(),
            ];
            $update = HarapanPasien::where('noreg', $request->noreg)->update($harapanpasien_data);
            if (!$update) {
                flash()->error('Error', 'Terjadi Kesalahan');
                return redirect()->back();
            } else {
                flash()->success('Selamat', 'Data berhasil diupdate');
                return redirect()->route('harapanpasien.index');
            }
        }
    }

    public function delete($id)
    {
        $harapan = HarapanPasien::findOrFail($id);
        $harapan->delete();
        flash()->error('Selamat', 'Data berhasil dihapus');
        return redirect()->route('harapanpasien.index');
    }
}
