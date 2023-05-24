<?php

namespace App\Http\Controllers\f1;

use App\Http\Controllers\Controller;
use App\Models\PersetujuanRanap;
use App\Models\Registrasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersetujuanRanapController extends Controller
{
    public function index()
    {
        $persetujuan = PersetujuanRanap::orderBy('created_at', 'DESC')->get();
        return view('f1.persetujuanranap.index', compact('persetujuan'));
    }

    public function create()
    {
        $today = Carbon::now()->format('Y-m-d');
        $noreg = Registrasi::join('REGDR', 'REGPAS.NOREG', '=', 'REGDR.NOREG')
            ->where('TGLREG', $today)
            ->orWhere(function ($query) {
                $query->where('REGDR.BAGREGDR', 'like', '%' . 91 . '%')
                    ->where('REGDR.BAGREGDR', 'like', '%' . 95 . '%');
            })
            ->orderBy('TGLREG', 'ASC')->get();
        // dd($noreg);
        return view('f1.persetujuanranap.create', compact('noreg'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'noreg' => 'required',
            'signed_pj' => 'required'
        ]);

        if ($request->has('signed_pj')) {
            $folderPath = public_path('uploads/persetujuanranap/');
            $image_parts = explode(";base64,", $request->signed_pj);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . uniqid() . '.' . $image_type;
            file_put_contents($file, $image_base64);
            $persetujuan = PersetujuanRanap::create([
                'noreg' =>  $request->noreg,
                'pj_nama' => $request->nama,
                'pj_hp' => $request->nohp,
                'pj_alamat' => $request->alamat,
                'pj_ktp' => $request->ktp,
                'pj_agama' => $request->agama,
                'pj_pendidikan' => $request->pendidikan,
                'ruangan' => $request->ruangan,
                'penanggung_biaya' => $request->penanggung_biaya,
                'pernah_rawat' => $request->tahun_rawat,
                'kelas_rawat' => $request->kelas_rawat,
                'nama_keluarga' => $request->namakeluarga,
                'alamat_keluarga' => $request->alamatkeluarga,
                'catatan' => $request->catatan,
                'pj_paraf'  =>  $request->signed_pj,
                'user_id' => Auth::id(),
            ]);
            flash()->success('Selamat', 'Data berhasil disimpan');
            return redirect()->route('persetujuanranap.index');
        }
    }

    public function edit(string $noreg)
    {
        $persetujuan = PersetujuanRanap::where('noreg', $noreg)->first();
        return view('f1.persetujuanranap.edit', compact('persetujuan'));
    }

    public function update(Request $request, PersetujuanRanap $persetujuan)
    {
        $this->validate($request, [
            'noreg' => 'required',
            'signed_pj' => 'required'
        ]);

        if ($request->has('signed_pj')) {
            $folderPath = public_path('uploads/persetujuanranap/');
            $image_parts = explode(";base64,", $request->signed_pj);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . uniqid() . '.' . $image_type;
            file_put_contents($file, $image_base64);

            $persetujuan_data = [
                'noreg' =>  $request->noreg,
                'pj_nama' => $request->nama,
                'pj_hp' => $request->nohp,
                'pj_alamat' => $request->alamat,
                'pj_ktp' => $request->ktp,
                'pj_agama' => $request->agama,
                'pj_pendidikan' => $request->pendidikan,
                'ruangan' => $request->ruangan,
                'penanggung_biaya' => $request->penanggung_biaya,
                'pernah_rawat' => $request->tahun_rawat,
                'kelas_rawat' => $request->kelas_rawat,
                'nama_keluarga' => $request->namakeluarga,
                'alamat_keluarga' => $request->alamatkeluarga,
                'catatan' => $request->catatan,
                'pj_paraf'  =>  $request->signed_pj,
                'user_id' => Auth::id(),
            ];

            $update = PersetujuanRanap::where('noreg', $request->noreg)->update($persetujuan_data);
            if (!$update) {
                flash()->error('Error', 'Terjadi Kesalahan');
                return redirect()->back();
            } else {
                flash()->success('Selamat', 'Data berhasil diupdate');
                return redirect()->route('persetujuanranap.index');
            }
        }
    }

    public function delete($id)
    {
        $persetujuan = PersetujuanRanap::findOrFail($id);
        $persetujuan->delete();
        flash()->error('Selamat', 'Data berhasil dihapus');
        return redirect()->route('persetujuanranap.index');
    }
}
