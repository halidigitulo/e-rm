<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TriageIgdTerapi;

class Terapi extends Component
{
    public $terapis, $tgl_terapi, $terapi, $paraf, $terapi_id;
    public $updateMode = false;

    public function render()
    {
        // $terapis = Terapi::all();
        $this->terapis = TriageIgdTerapi::all();
        return view('livewire.f2.triage.terapi.index');
    }

    public function resetInputFields()

    {
        $this->tgl_terapi = '';
        $this->terapi = '';
        $this->paraf = '';
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function store()
    {
        $validatedData = $this->validate([
            'tgl_terapi'    => 'required',
            'terapi'        => 'required',
            'paraf'         => 'required',
        ]);

        TriageIgdTerapi::create($validatedData);
        session()->flash('message', 'Data Berhasil Ditambahkan.');
        return redirect()->back();
        $this->resetInputFields();
    }
}
