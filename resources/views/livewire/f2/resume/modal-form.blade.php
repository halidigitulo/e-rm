{{-- Modal Tambah Data Resume Rawat jalan --}}
<div wire:ignore.self class="modal fade" id="addResumeRajal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Resume Rawat Jalan</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeResume">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nama Dokter</label>
                        <select wire:model.defer="kode_dokter" id="" class="form-control">
                            <option value="">--Pilih Dokter</option>
                            {{-- @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach --}}
                        </select>
                        @error('kode_dokter')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Diagnosis</label>
                        <input type="text" wire:model.defer="diagnosis" class="form-control">
                        @error('diagnosis')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Terapi</label>
                        <textarea name="" id="" cols="30" rows="5" wire:model.defer="terapi" class="form-control"></textarea>
                        @error('terapi')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">ICD</label>
                        <input type="text" wire:model.defer="icd" class="form-control">
                        @error('icd')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click="closeModal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>