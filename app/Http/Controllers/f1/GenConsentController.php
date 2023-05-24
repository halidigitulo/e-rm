<?php

namespace App\Http\Controllers\f1;

use App\Http\Controllers\Controller;
use App\Models\GeneralConsent;
use App\Models\Registrasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenConsentController extends Controller
{
    public function index()
    {
        $general = GeneralConsent::orderBy('created_at', 'DESC')->get();
        return view('f1.generalconsent.index', compact('general'));
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
        return view('f1.generalconsent.create', compact('noreg'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'noreg' => 'required',
            'nama' => 'required',
            // 'signed' => 'required',
        ]);

        if ($request->has('signed')) {
            $folderPath = public_path('uploads/generalconsent/');
            $image_parts = explode(";base64,", $request->signed);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . uniqid() . '.' . $image_type;
            file_put_contents($file, $image_base64);
            $general = GeneralConsent::create([
                'noreg' =>  $request->noreg,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tgllahir' => $request->tgllahir,
                'nohp' => $request->nohp,
                'keluarga_1' => $request->keluarga_1,
                'keluarga_2' => $request->keluarga_2,
                'privasi' => $request->privasi,
                'sign'  =>  $request->signed,
                'user_id' => Auth::id(),
            ]);
            flash()->success('Selamat', 'Data berhasil disimpan');
            return redirect()->route('generalconsent.index');
        }
    }

    public function edit(string $noreg)
    {
        $general = GeneralConsent::where('noreg', $noreg)->first();
        return view('f1.generalconsent.edit', compact('general'));
    }

    public function update(Request $request, GeneralConsent $general)
    {
        $this->validate($request, [
            'noreg' => 'required',
            'nama' => 'required',
            'signed' => 'required'
        ]);

        if ($request->has('signed')) {
            $folderPath = public_path('uploads/generalconsent/');
            $image_parts = explode(";base64,", $request->signed);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . uniqid() . '.' . $image_type;
            file_put_contents($file, $image_base64);

            $generalconsent_data = [
                'noreg' =>  $request->noreg,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tgllahir' => $request->tgllahir,
                'nohp' => $request->nohp,
                'keluarga_1' => $request->keluarga_1,
                'keluarga_2' => $request->keluarga_2,
                'privasi' => $request->privasi,
                'sign'  =>  $request->signed,
                'user_id' => Auth::id(),
            ];
        } else {
            $generalconsent_data = [
                'noreg' =>  $request->noreg,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tgllahir' => $request->tgllahir,
                'nohp' => $request->nohp,
                'keluarga_1' => $request->keluarga_1,
                'keluarga_2' => $request->keluarga_2,
                'privasi' => $request->privasi,
                'sign'  =>  $request->signed,
                'user_id' => Auth::id(),
            ];
        }
        $update = GeneralConsent::where('noreg', $request->noreg)->update($generalconsent_data);
        if (!$update) {
            flash()->error('Error', 'Terjadi Kesalahan');
            return redirect()->back();
        } else {
            flash()->success('Selamat', 'Data berhasil diupdate');
            return redirect()->route('generalconsent.index');
        }
    }

    public function delete($id)
    {
        $general = GeneralConsent::findOrFail($id);
        $general->delete();
        flash()->error('Selamat', 'Data berhasil dihapus');
        return redirect()->route('generalconsent.index');
    }
}
