@extends('template.home')
@section('judul', 'Edit Data Harapan Pasien')
@section('content')
    <div class="col">
        <div class="card card-primary card-outline shadow">
            <div class="card-header">
                <div class="card-title">
                    <h5 class="text-gray-800">Edit Data Harapan Pasien </h5>
                </div>
                <div class="card-tools">
                    <a href="{{ url('f1/harapanpasien') }}" class="float-end btn btn-sm btn-warning"><i class="fas fa-undo"></i>
                        Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('harapanpasien.update', $harapan->noreg) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <h6 class="text-muted">[ Identitas Pasien ]</h6>
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Noreg</label>
                                <div class="input-group">
                                    <input type="text" name="noreg"
                                        class="form-control {{ $errors->has('noreg') ? 'is-invalid' : '' }} noreg" readonly
                                        value="{{ $harapan->noreg }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }} namapasien" readonly
                                    value="{{ $harapan->registrasi->pasien->NAMAPASIEN }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">No. RM</label>
                                <input type="text" name="norm"
                                    class="form-control {{ $errors->has('norm') ? 'is-invalid' : '' }} norm" readonly
                                    value="{{ substr($harapan->registrasi->pasien->NOPASIEN, 2) }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tempat / Tgl. Lahir</label>
                                <div class="input-group">
                                    <input type="text" name="tempat"
                                        class="form-control {{ $errors->has('tempat') ? 'is-invalid' : '' }} tempatlahir"
                                        readonly value="{{ $harapan->registrasi->pasien->TMPLAHIR }}">
                                    <input type="text" name="tanggal"
                                        class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }} tanggallahir"
                                        value="{{ date('d M Y', strtotime($harapan->registrasi->pasien->TGLLAHIR)) }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted">[ Data Penanggung Jawab ]</h6>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $harapan->pj_nama }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempatlahir"
                                    value="{{ $harapan->pj_tempatlahir }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgllahir" value="{{ $harapan->pj_tgllahir }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">No Hp</label>
                                <input type="text" class="form-control" name="nohp" value="{{ $harapan->pj_hp }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Harapan Keluarga</label>
                                <textarea name="harapan" id="" cols="30" rows="3" class="form-control">{{ $harapan->harapan }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tanda Tanda Penanggung Jawab <sup class="text-danger">*</sup></label><br>
                                <div id="sigpj" class="form-control mb-3" required></div><br>
                                <button id="clear" class="btn btn-sm btn-danger"><i class="fas fa-eraser"></i>
                                    Bersihkan</button><br>
                                <textarea name="signed_pj" id="signature_pj" style="display: none"></textarea>
                                <img src="{{ $harapan->pj_paraf }}" alt="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        var sig = $('#sigpj').signature({
            syncField: '#signature_pj',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature_pj").val('');
        });
    </script>
@endpush
