<?php

namespace App\Http\Controllers\f4;

use App\Http\Controllers\Controller;
use App\Models\Cppt;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CpptController extends Controller
{
    public function index()
    {
        $cppt = Cppt::orderBy('created_at', 'DESC')->get();
        return view('f4.cppt.index', compact('cppt'));
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
        return view('f4.cppt.create', compact('noreg'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'noreg' => 'required',
        ]);

        $cppt = Cppt::create([
            'noreg' =>  $request->noreg,
            's' => $request->s,
            'o' => $request->o,
            'a' => $request->a,
            'p' => $request->p,
            'ppa' => $request->ppa,
            'instruksi' => $request->instruksi,
            'user_id' => Auth::user()->id,
        ]);
        flash()->success('Selamat', 'Data berhasil ditambahkan');
        return redirect()->route('cppt.index');
    }

    public function edit(string $noreg)
    {
        $cppt = Cppt::where('noreg', $noreg)->first();
        return view('f4.cppt.edit', compact('cppt'));
    }

    public function update(Request $request, Cppt $cppt)
    {
        $this->validate($request, [
            'noreg' => 'required',
        ]);

        $cppt_data = [
            'noreg' =>  $request->noreg,
            's' => $request->s,
            'o' => $request->o,
            'a' => $request->a,
            'p' => $request->p,
            'ppa' => $request->ppa,
            'instruksi' => $request->instruksi,
            'user_id' => Auth::user()->id,
        ];
        $update = Cppt::where('noreg', $request->noreg)->update($cppt_data);
        flash()->success('Selamat', 'Data berhasil diupdate');
        return redirect()->route('cppt.index');
    }

    public function delete($id)
    {
        $cppt = Cppt::findOrFail($id);
        $cppt->delete();
        flash()->error('Selamat', 'Data berhasil dihapus');
        return redirect()->route('cppt.index');
    }
}
