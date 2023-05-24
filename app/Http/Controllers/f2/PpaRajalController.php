<?php

namespace App\Http\Controllers\f2;

use App\Http\Controllers\Controller;
use App\Models\PpaRajal;
use App\Models\Registrasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PpaRajalController extends Controller
{
    public function index()
    {
        $ppa = PpaRajal::orderBy('created_at', 'DESC')->get();
        return view('f2.pparajal.index', compact('ppa'));
    }

    public function create()
    {
        $today = Carbon::now()->format('Y-m-d');
        $noreg = Registrasi::join('REGDR', 'REGPAS.NOREG', '=', 'REGDR.NOREG')
            ->where('TGLREG', $today)
            ->where('REGDR.BAGREGDR', 'like', '%' . 91 . '%')
            ->orderBy('TGLREG', 'ASC')->get();
        return view('f2.pparajal.create', compact('noreg'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'noreg' => 'required',
        ]);
        $pparajal = PpaRajal::create([
            'noreg' => $request->noreg,
            's'     => $request->s,
            'o'     => $request->o,
            'a'     => $request->a,
            'p'     => $request->p,
            'user_id' => Auth::user()->id,
        ]);
        flash()->success('Selamat', 'Data berhasil ditambahkan');
        return redirect()->route('pparajal.index');
    }

    public function dashboard($noreg)
    {
        // $today = Carbon::now()->format('Y-m-d');
        $noreg = Registrasi::where('noreg', $noreg)->first();
        return view('f2.pparajal.create-d', compact('noreg'));
    }

    public function edit(string $noreg)
    {
        $ppa = PpaRajal::where('noreg', $noreg)->first();
        return view('f2.pparajal.edit', compact('ppa'));
    }

    public function update(Request $request, PpaRajal $ppa)
    {
        $this->validate($request, [
            'noreg' => 'required'
        ]);
        $pparajal_data = [
            'noreg' => $request->noreg,
            's'     => $request->s,
            'o'     => $request->o,
            'a'     => $request->a,
            'p'     => $request->p,
            'user_id' => Auth::user()->id,
        ];
        $update = PpaRajal::where('noreg', $request->noreg)->update($pparajal_data);
        if (!$update) {
            flash()->error('Error', 'Terjadi Kesalahan');
            return redirect()->back();
        } else {
            flash()->success('Selamat', 'Data berhasil diupdate');
            return redirect()->route('pparajal.index');
        }
    }

    public function delete($id)
    {
        $pparajal = PpaRajal::findOrFail($id);
        $pparajal->delete();
        flash()->error('Selamat', 'Data berhasil dihapus');
        return redirect()->route('pparajal.index');
    }
}
