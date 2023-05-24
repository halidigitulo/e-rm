<?php

namespace App\Http\Controllers\f2;

use App\Http\Controllers\Controller;
use App\Models\Kie;
use App\Models\MKeperawatan;
use App\Models\Registrasi;
use App\Models\RKeperawatan;
use App\Models\TKeperawatan;
use App\Models\TriageIgd;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TriageIgdController extends Controller
{
    public function index()
    {
        $triage = TriageIgd::orderBy('created_at', 'DESC')->get();
        return view('f2.triageigd.index', compact('triage'));
    }

    public function simpanTerapi( Request $req )
    {
        // $terapi =  new CreateTriageIgdTerapisTable();\
        // $terapi->save();


        //     return $req;


            $saveTerapi = DB::table("triage_igd_terapis")->insert([
                // "id"=>1,
                "triage_igd_id"=>123,
                "paraf"=>$req['ttd'],
                "terapi"=>$req['terapi'],
                "tgl_triage"=> date('Y-m-d H:i:s'),
                "created_at"=> date('Y-m-d H:i:s'),
                "updated_at"=> date('Y-m-d H:i:s'),
                // "id"=>1,
            ]);

        return response()->json([
            "status" => $saveTerapi ? 'suksess' :'gagal'
        ]) ;
        // $triage = TriageIgd::orderBy('created_at', 'DESC')->get();
        // return view('f2.triageigd.index', compact('triage'));
    }

    public function create()
    {
        $m_keperawatan = MKeperawatan::all();
        $r_keperawatan = RKeperawatan::all();
        $t_keperawatan = TKeperawatan::all();
        $today = Carbon::now()->format('Y-m-d');
        $noreg = Registrasi::join('REGDR', 'REGPAS.NOREG', '=', 'REGDR.NOREG')
            ->where('TGLREG', $today)
            ->where('REGDR.BAGREGDR', '=', '9501')
            ->orderBy('TGLREG', 'ASC')->get();
        // dd($noreg);
        $kie = Kie::all();
        return view('f2.triageigd.create', compact('noreg','kie','m_keperawatan','r_keperawatan','t_keperawatan'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'noreg' => 'required',
            'user_id' => 'required'
        ]);

        $triage = TriageIgd::create([
            'noreg'             => $request->noreg,
            'alergi'            => $request->alergi,
            'status_psikologi'  => $request->status_psikologi,
            'kedatangan'        => $request->kedatangan,
            'asal_rujukan'      => $request->asal_rujukan,
            'surat_pengantar'   => $request->surat_pengantar,
            'diagnosa'          => $request->diagnosa,
            'pengantar_ambulans'=> $request->pengantar_ambulans == true ? '1' : '0',
            'pengantar_paramedis'=> $request->pengantar_paramedis == true ? '1' : '0',
            'triage_oleh'       => $request->triage_oleh,
            'triage_pukul'      => $request->triage_pukul,
            'triage_tipe'       => $request->triage_tipe,
            'jalan_nafas'       => $request->jalan_nafas,
            'gerakan_dada'      => $request->gerakan_dada,
            'tipe_pernafasan'   => $request->tipe_pernafasan,
            'denyut_nadi'       => $request->denyut_nadi,
            'kulit'             => $request->kulit,
            'akral'             => $request->akral,
            'crt'               => $request->crt,
            'kesadaran'         => $request->kesadaran,
            'bb'                => $request->bb,
            'spo2'              => $request->spo2,
            'gds'               => $request->gds,
            'td'                => $request->td,
            'nadi'              => $request->nadi,
            'nafas'             => $request->nafas,
            'suhu'              => $request->suhu,
            'nyeri'             => $request->nyeri,
            'lokasi'            => $request->lokasi,
            'flacc_total_skor'  => $request->flacc_total_skor,
            'klasifikasi_triage'=> $request->klasifikasi_triage,
            'nyeri_wong_baker'  => $request->nyeri_wong_baker,
            'pasien_jatuh_1'    => $request->pasien_jatuh_1 == true ? '1' : '0',
            'pasien_jatuh_2'    => $request->pasien_jatuh_2 == true ? '1' : '0',
            'dp_1'              => $request->dp_1 == true ? '1' : '0',
            'dp_2'              => $request->dp_2 == true ? '1' : '0',
            'dp_3'              => $request->dp_3 == true ? '1' : '0',
            'dp_4'              => $request->dp_4 == true ? '1' : '0',
            'anamnesa'          => $request->anamnesa,
            'penyakit_terdahulu'=> $request->penyakit_terdahulu,
            'penyakit_keluarga' => $request->penyakit_keluarga,
            'pengobatan'        => $request->pengobatan,
            'kandungan_kebidanan'=> $request->kandungan_kebidanan,
            'gcs_e'             => $request->gcs_e,
            'gcs_v'             => $request->gcs_v,
            'gcs_m'             => $request->gcs_m,
            'gcs_total'         => $request->gcs_total,
            'kepala_wajah'      => $request->kepala_wajah,
            'leher'             => $request->leher,
            'thorax_inspeksi'   => $request->thorax_inspeksi,
            'thorax_palpasi'    => $request->thorax_palpasi,
            'thorax_perkusi'    => $request->thorax_perkusi,
            'thorax_auskultasi' => $request->thorax_auskultasi,
            'abdomen_inspeksi'  => $request->abdomen_inspeksi,
            'abdomen_palpasi'   => $request->abdomen_palpasi,
            'abdomen_perkusi'   => $request->abdomen_perkusi,
            'abdomen_auskultasi'=> $request->abdomen_auskultasi,
            'anogenital'        => $request->anogenital,
            'ekstremitas'       => $request->ekstremitas,
            'neurologis'        => $request->neurologis,
            'penunjang_ekg'     => $request->penunjang_ekg,
            'penunjang_laboratorium'=> $request->penunjang_laboratorium,
            'penunjang_lainnya' => $request->penunjang_lainnya,
            'diagnosa_kerja'    => $request->diagnosa_kerja,
            'diagnosa_banding'  => $request->diagnosa_banding,
            'nutrisi_bb'        => $request->nutrisi_bb,
            'nutrisi_tb'        => $request->nutrisi_tb,
            'asupan_makan'      => $request->asupan_makan,
            'user_id'           => Auth::user()->id,
        ]);

        if($request->hasFile('sign_terapi')){
            $folderPath = public_path('uploads/f1/triage/');
            $image_parts = explode(";base64," ,$request->sign_terapi);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . uniqid() . '.' . $image_type;
            file_put_contents($file, $image_base64);
        }
        $triage->kies()->attach($request->kie);
        return redirect()->route('triageigd.index')->with('success','Data berhasil ditambahkan');
    }

    public function edit(string $noreg)
    {
        $triage = TriageIgd::where('noreg', $noreg)->first();
        $kie = Kie::all();
        return view('f2.triageigd.edit', compact('triage','kie'));
    }

    public function delete($id)
    {
        $triage = TriageIgd::findOrFail($id);
        $triage->delete();
        flash()->error('Selamat', 'Data berhasil dihapus');
        return redirect()->route('triageigd.index');
    }
}
