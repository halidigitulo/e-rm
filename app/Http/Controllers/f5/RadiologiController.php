<?php

namespace App\Http\Controllers\f5;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\Ppa;
use App\Models\Radiologi;
use App\Models\Ranap;
use App\Models\Registrasi;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

class RadiologiController extends Controller
{
    public function index()
    {
        $hasil = Radiologi::orderBy('created_at', 'desc')->with('registrasi')->get();
        return view('f5.radiologi.index', compact('hasil'));
    }

    public function create()
    {
        // ambil data registrasi 30 hari terakhir
        // $today = Carbon::now()->subDays(5);
        $today = Carbon::now()->format('Y-m-d');
        $noreg = Registrasi::where('TGLREG', $today)->orderBy('TGLREG', 'ASC')->get();
        $noregri = Registrasi::join('REGRWI', 'REGRWI.NOREG', '=', 'REGPAS.NOREG')
            ->where('REGPAS.VALIDRI', '<>', 'V')
            ->where('REGRWI.STSPULANG', 'I')
            ->get();
        // dd($noregri);

        $pemeriksaan = Pemeriksaan::where('KODEPMR', 'LIKE', 'HKR' . '%')->get();
        $dokter_kirim = Ppa::all();
        $dokter_periksa = Dokter::where('KDSPESIAL', '=', '31')->where('STSKERJADR', '<>', 'X')->get();
        return view('f5.radiologi.create', compact('pemeriksaan', 'dokter_kirim', 'dokter_periksa', 'noreg', 'noregri'));
    }

    public function show(int $noreg)
    {
        $registrasi = Registrasi::where('NOREG', $noreg)->first();
        $radiologi = Radiologi::where('NOREG', $noreg)->first();
        return view('f5.radiologi.show', compact('registrasi', 'radiologi'));
    }

    public function edit(string $noreg)
    {
        $pemeriksaan = Pemeriksaan::where('KODEPMR', 'LIKE', 'HKR' . '%')->get();
        $dokter_kirim = Dokter::where('STSKERJADR', '<>', 'X')->get();
        $dokter_periksa = Dokter::where('KDSPESIAL', '=', '31')->where('STSKERJADR', '<>', 'X')->get();
        $radiologi = Radiologi::where('noreg', $noreg)->first();
        return view('f5.radiologi.edit', compact('radiologi', 'pemeriksaan', 'dokter_kirim', 'dokter_periksa'));
    }

    public function generate(int $noreg)
    {
        $registrasi = Registrasi::where('NOREG', $noreg)->with('radiologi')->first();
        $data = [
            'registrasi' => $registrasi
        ];

        $pdf = Pdf::loadView('f5.radiologi.pdf', $data);
        return $pdf->download('Hasil Pemeriksaan Radiologi-' . $noreg . '.pdf');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'isi' => 'required|min:5',
            'noreg' => 'required',
            'kodepmr' => 'required',
            'kodedokter_kirim' => 'required',
            'kodedokter_periksa' => 'required'
        ]);
        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time() . $gambar->getClientOriginalName();
            $gambar->move('uploads/radiologi/', $new_gambar);
            $expertise = Radiologi::create([
                'noreg' => $request->noreg,
                'isi' => $request->isi,
                'kesimpulan' => $request->kesimpulan,
                'gambar' => 'uploads/radiologi/' . $new_gambar,
                'kodepmr' => $request->kodepmr,
                'kodedokter_kirim' => $request->kodedokter_kirim,
                'kodedokter_periksa' => $request->kodedokter_periksa
            ]);
        } else {
            $expertise = Radiologi::create([
                'noreg' => $request->noreg,
                'isi' => $request->isi,
                'kesimpulan' => $request->kesimpulan,
                'kodepmr' => $request->kodepmr,
                'kodedokter_kirim' => $request->kodedokter_kirim,
                'kodedokter_periksa' => $request->kodedokter_periksa
            ]);
        }
        // return $expertise;
        flash()->success('Selamat', 'Data berhasil ditambahkan');
        return redirect()->route('radiologi.index');
    }

    public function update(Request $request )
    {
        $this->validate($request, [
            'isi' => 'required|min:5',
            'noreg' => 'required',
            'kodepmr' => 'required',
            'kodedokter_kirim' => 'required',
            'kodedokter_periksa' => 'required'
        ]);
        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time() . $gambar->getClientOriginalName();
            $gambar->move('uploads/radiologi/', $new_gambar);
            $expertise_data=[
                'noreg' => $request->noreg,
                'isi' => $request->isi,
                'kesimpulan' => $request->kesimpulan,
                'gambar' => 'uploads/radiologi/' . $new_gambar,
                'kodepmr' => $request->kodepmr,
                'kodedokter_kirim' => $request->kodedokter_kirim,
                'kodedokter_periksa' => $request->kodedokter_periksa
            ];
        }else{
            $expertise_data= [
                'noreg' => $request->noreg,
                'isi' => $request->isi,
                'kesimpulan' => $request->kesimpulan,
                'kodepmr' => $request->kodepmr,
                'kodedokter_kirim' => $request->kodedokter_kirim,
                'kodedokter_periksa' => $request->kodedokter_periksa
            ];
        }
        $update = Radiologi::where('noreg', $request->noreg)->update($expertise_data);
        flash()->success('Selamat', 'Data berhasil diupdate');
        return redirect()->route('radiologi.index');
    }

    public function delete($id)
    {
        $expertise = Radiologi::findOrFail($id);
        if ($expertise->gambar) {
            $destination = public_path($expertise->gambar);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $expertise->delete();
            flash()->error('Selamat', 'Data berhasil dihapus');
            return redirect()->route('radiologi.index');
        }else{
            $expertise->delete();
            flash()->error('Selamat', 'Data berhasil dihapus');
            return redirect()->route('radiologi.index');
        }
    }
}
