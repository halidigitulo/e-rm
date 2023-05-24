<form wire:submit.prevent="store()">
    <div class="row">
        <div class="col-md-3">
            <label for="">Tgl / Jam</label>
            <input wire:model="tgl_terapi" type="datetime-local" class="form-control" id="tgl_terapi">
            @error('tgl_terapi')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="">Terapi / Tindakan Konsultasi</label>
            <textarea wire:model="terapi" id="terapi" cols="30" rows="10" class="form-control"></textarea>
            @error('terapi')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="">Tanda Tangan</label><br>
            <div id="sig" class="form-control mb-3" style="overflow: hidden"></div>
            <textarea name="sign_terapi" id="signature64" style="display: none" wire:model="paraf"></textarea><br>
            <button id="clear" class="btn btn-sm btn-danger mb-3"><i class="fas fa-eraser"></i>
                Bersihkan</button>
        </div>
        {{-- <div class="col-md-12">
            <img src="" alt="" srcset="">
        </div> --}}
        <div class="col mb-3">
            {{-- <button wire:click.prevent="store()" type="submit" class="btn btn-success">Simpan</button> --}}
            <button onclick="simpan()" type="button" class="btn btn-success">Simpan</button>
            {{-- <button type="submit" class="btn btn-success">Simpan</button> --}}
        </div>
    </div>
</form>

<script>
    function simpan() {
        //    var tgl = $("tgl_terapi").val()
        var terapi = $("#terapi").val()
        var ttd = $("#signature64").val()
        // debugger
        console.log('tgl', terapi)
        console.log('ttd', ttd)

        var obj = {
            terapi: terapi,
            ttd: ttd,
            // terapi : terapi,
        }

        // $.post("/simpan-ttd", obj , function(data){
        //     console.log('data', data)
        // })
        // debugger

        $.post("/api/triageigd-simpan-terapi", obj, function(data) {
                console.log('data', data)
                // debugger
            // $(".result").html(data);
        });


    // });


    }
</script>
