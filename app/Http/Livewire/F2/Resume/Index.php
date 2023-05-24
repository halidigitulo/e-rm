<?php

namespace App\Http\Livewire\F2\Resume;

use App\Models\ResumeRajal;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $kode_dokter, $diagnosis, $terapi, $icd, $user_id;

    public function rules()
    {
        return [
            // 'kode_dokter'   => 'required',
            'user_id'       => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.f2.resume.index')
            ->extends('template.home');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->kode_dokter = NULL;
        $this->diagnosis = NULL;
        $this->terapi = NULL;
        $this->icd = NULL;
    }

    public function storeResume()
    {
        $validatedData = $this->validate();
        ResumeRajal::create([
            // 'kode_dokter' => $this->kode_dokter,
            'kode_dokter' => 1,
            'diagnosis' => $this->diagnosis,
            'terapi' => $this->terapi,
            'icd' => $this->icd,
            'user_id' => $this->user_id,
        ]);

        session()->flash('message','Data berhasil disimpan');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
}
