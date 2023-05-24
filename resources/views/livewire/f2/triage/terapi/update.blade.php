<form>
    <div class="row">
        <div class="col-md-12">
            <label for="">Tgl / Jam</label>
            <input wire:model="tgl_terapi" type="datetime-local" class="form-control"
                name="tgl_terapi" id="tgl_terapi">
            @error('tgl_terapi')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="">Terapi / Tindakan Konsultasi</label>
            <textarea wire:model="tindakan" name="tindakan" id="tindakan" cols="30" rows="10" class="form-control"></textarea>
            @error('terapi')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="">Tanda Tangan</label><br>
            <div id="sig" class="form-control mb-3" style="overflow: hidden"></div>
            <textarea name="sign_terapi" id="signature64" style="display: none" wire:model="ttd"></textarea>
            <button id="clear" class="btn btn-sm btn-danger mb-3"><i class="fas fa-eraser"></i>
                Bersihkan</button>
        </div>
        <div class="col mb-3">
            <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
        </div>
    </div>
</form>