<?php

namespace App\Http\Controllers\f8;

use App\Http\Controllers\Controller;
use App\Models\Icd;
use App\Models\Registrasi;
use App\Models\Resume;
use App\Models\ResumeDiagnosaSekunder;
use App\Models\ResumeTerapi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResumeController extends Controller
{
    public function index()
    {
        $resume = Resume::orderBy('created_at', 'DESC')->get();
        return view('f8.resume.index', compact('resume'));
    }

    public function create(Request $request)
    {
        $icd = Icd::where('kddiagnosa','LIKE','%' . $request->kode_icd . '%')->get();
        // dd($icd);
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
        return view('f8.resume.create', compact('noreg','icd'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'noreg' => 'required',
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required',
        ]);

        $resume = Resume::create([
            'noreg' => $request->noreg,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_keluar' => $request->tgl_keluar,
            'ruangan' => $request->ruangan,
            'penanggung_biaya' => $request->penanggung_biaya,
            'diagnosa_masuk' => $request->diagnosa_masuk,
            'riwayat' => $request->riwayat,
            'pemeriksaan_fisik' => $request->pemeriksaan_fisik,
            'pemeriksaan_penunjang' => $request->pemeriksaan_penunjang,
            'terapi' => $request->terapi,
            'hasil_konsultasi' => $request->hasil_konsultasi,
            'kode_diagnosa_utama' => $request->kode_diagnosa_utama,
            'alergi' => $request->alergi,
            'laboratorium' => $request->laboratorium,
            'diet' => $request->diet,
            'instruksi' => $request->instruksi,
            'kondisi_keluar' => $request->kondisi_keluar,
            'cara_keluar' => $request->cara_keluar,
            'pengobatan_lanjutan' => $request->pengobatan_lanjutan,
            'tgl_kontrol' => $request->tgl_kontrol,
            'user_id' => Auth::user()->id,
        ]);

        $resume->diagnosa_sekunder()->attach($request->kode_icd);
        flash()->success('Selamat', 'Data berhasil ditambahkan');
        return redirect()->route('resume.index');
    }

    public function edit(string $noreg)
    {
        $icd = Icd::all();
        $obat = ResumeTerapi::where('noreg', $noreg)->get();
        $resume = Resume::where('noreg', $noreg)->with('diagnosa')->first();
        return view('f8.resume.edit', compact('resume', 'obat','icd'));
    }

    public function update(Request $request, Resume $resume)
    {
        $this->validate($request, [
            'noreg' => 'required',
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required',
        ]);

        $resume_data = [
            'noreg' => $request->noreg,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_keluar' => $request->tgl_keluar,
            'ruangan' => $request->ruangan,
            'penanggung_biaya' => $request->penanggung_biaya,
            'diagnosa_masuk' => $request->diagnosa_masuk,
            'riwayat' => $request->riwayat,
            'pemeriksaan_fisik' => $request->pemeriksaan_fisik,
            'pemeriksaan_penunjang' => $request->pemeriksaan_penunjang,
            'terapi' => $request->terapi,
            'hasil_konsultasi' => $request->hasil_konsultasi,
            'kode_diagnosa_utama' => $request->kode_diagnosa_utama,
            'alergi' => $request->alergi,
            'laboratorium' => $request->laboratorium,
            'diet' => $request->diet,
            'instruksi' => $request->instruksi,
            'kondisi_keluar' => $request->kondisi_keluar,
            'cara_keluar' => $request->cara_keluar,
            'pengobatan_lanjutan' => $request->pengobatan_lanjutan,
            'tgl_kontrol' => $request->tgl_kontrol,
            'user_id' => Auth::user()->id,
        ];
        $update = Resume::where('noreg', $request->noreg)->update($resume_data);
        flash()->success('Selamat', 'Data berhasil diupdate');
        return redirect()->route('resume.index');
    }

    public function delete($id)
    {
        $resume = Resume::findOrFail($id);
        $resume->delete();
        flash()->error('Selamat', 'Data berhasil dihapus');
        return redirect()->route('resume.index');
    }

    public function simpanObat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'noreg' => 'required',
            'nama_obat' => 'required|string|max:191',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else {
            $obat = new ResumeTerapi;
            $obat->noreg = $request->input('noreg');
            $obat->nama_obat = $request->input('nama_obat');
            $obat->jumlah = $request->input('jumlah');
            $obat->dosis = $request->input('dosis');
            $obat->frekuensi = $request->input('frekuensi');
            $obat->cara_pemberian = $request->input('cara_pemberian');
            $obat->save();
            return response()->json([
                'status' => 200,
                'message' => 'Data user berhasil disimpan',
            ]);
        }
    }

    public function editObat($id)
    {
        $obat = ResumeTerapi::find($id);
        if ($obat) {
            return response()->json([
                'status' => 200,
                'obat' => $obat,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Data tidak ditemukan",
            ]);
        }
    }

    public function updateObat(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'noreg' => 'required',
            'nama_obat' => 'required|string|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else {
            $obat = ResumeTerapi::find($id);
            if ($obat) {
                $obat->nama_obat = $request->nama_obat;
                $obat->jumlah = $request->jumlah;
                $obat->dosis = $request->dosis;
                $obat->frekuensi = $request->frekuensi;
                $obat->cara_pemberian = $request->cara_pemberian;
                $obat->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Data obat berhasil diupdate',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "Data tidak ditemukan",
                ]);
            }
        }
    }

    public function fetchData(Request $req)
    {
        $obat = DB::table("resume_terapis")->where('noreg', $req->noreg)->get();

        return response()->json([
            'obat' => $obat,
        ]);
    }

    public function destroy($id)
    {
        $obat = ResumeTerapi::find($id);
        $obat->delete();
        return response()->json([
            'status' => 200,
            'message' => "Data berhasil dihapus",
        ]);
    }

    public function fetchDataDiagnosa(Request $req)
    {
        $diagnosa = DB::table("resume_diagnosa_sekunders")->where('noreg', $req->noreg)->get();

        return response()->json([
            'diagnosa' => $diagnosa,
        ]);
    }

    public function simpanDiagnosa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'noreg' => 'required',
            'kode_diagnosa' => 'required|string|max:191',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else {
            $diagnosa = new ResumeDiagnosaSekunder;
            $diagnosa->noreg = $request->input('noreg');
            $diagnosa->kode_diagnosa = $request->input('kode_diagnosa');
            $diagnosa->save();
            return response()->json([
                'status' => 200,
                'message' => 'Data user berhasil disimpan',
            ]);
        }
    }
}
