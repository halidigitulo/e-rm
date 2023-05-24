@extends('template.home')
@section('judul', 'Tambah Data PPA Rajal')
@section('content')
    @include('flash-message')
    <div class="col">
        <div class="card card-primary card-outline shadow">
            <div class="card-header">
                <div class="card-title">
                    <h5 class="text-gray-800">Tambah Data PPA Rajal </h5>
                </div>
                <div class="card-tools">
                    <a href="{{ url('f2/pparajal') }}" class="float-end btn btn-sm btn-warning"><i class="fas fa-undo"></i>
                        Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('pparajal.store') }}" method="post">
                    @csrf
                    <h6 class="text-muted">[ Identitas Pasien ]</h6>
                    <div class="row mt-3">
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">Noreg</label>
                                <div class="input-group">
                                    <input type="text" name="noreg"
                                        class="form-control"
                                        value="{{$noreg->NOREG}}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control"
                                    value="{{$noreg->pasien->NAMAPASIEN}}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">No. RM</label>
                                <input type="text" name="norm"
                                    class="form-control"
                                    value="{{ substr($noreg->pasien->NOPASIEN,2) }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">Tempat / Tgl. Lahir</label>
                                <div class="input-group">
                                    <input type="text" name="tempat"
                                        class="form-control"
                                        value="{{ $noreg->pasien->TMPLAHIR }}" readonly>
                                    <input type="text" name="tanggal"
                                        class="form-control"
                                        value="{{ date('d M Y', strtotime($noreg->pasien->TGLLAHIR)) }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat"
                                    class="form-control"
                                    value="{{ $noreg->pasien->ALM1PASIEN }}" readonly>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted">[ Hasil Asesmen Pasien (SOAP) ]</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">S (Subject)</label>
                                <textarea name="s" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">O (Object)</label>
                                <textarea name="o" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">A (Assesment)</label>
                                <textarea name="a" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">P (Plan)</label>
                                <textarea name="p" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i class="fas fa-undo"></i> Reset</button>
                </form>
            </div>
        </div>
    </div>

@endsection