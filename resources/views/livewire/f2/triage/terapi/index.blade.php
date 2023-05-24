<div>
    <h5 class="text-center">DAFTAR TERAPI / TINDAKAN</h5>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($updateMode)
        @include('livewire.f2.triage.terapi.update')
    @else
        @include('livewire.f2.triage.terapi.create')
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="table-terapi">
            <thead>
                <tr>
                    <th>Tgl / Jam</th>
                    <th>Terapi / Tindakan Konsultasi</th>
                    <th>Paraf</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($terapis as $item)
                    <tr>
                        <td>{{ $item->tgl_terapi }}</td>
                        <td>{{ $item->terapi }}</td>
                        <td> <img src="{{ $item->paraf }}" > </td>
                        <td>
                            <button wire:click="edit({{ $item->id }})" class="btn btn-warning btn-sm"><i
                                    class="fas fa-pencil"></i> Edit</button>
                            <button wire:click="delete({{ $item->id }})" class="btn btn-danger btn-sm"><i
                                    class="fas fa-trash-alt"></i> Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
