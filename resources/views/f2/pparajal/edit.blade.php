@extends('template.home')
@section('judul', 'Edit Data PPA Rajal')
@section('content')
    @include('flash-message')
    <div class="col">
        <div class="card card-primary card-outline shadow">
            <div class="card-header">
                <div class="card-title">
                    <h5 class="text-gray-800">Edit Data PPA Rajal </h5>
                </div>
                <div class="card-tools">
                    <a href="{{ url('f2/pparajal') }}" class="float-end btn btn-sm btn-warning"><i class="fas fa-undo"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('pparajal.update', $ppa->noreg) }}" method="post">
                    @csrf
                    @method('patch')
                    <h6 class="text-muted">[ Identitas Pasien ]</h6>
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Noreg</label>
                                <div class="input-group">
                                    <input type="text" name="noreg"
                                        class="form-control {{ $errors->has('noreg') ? 'is-invalid' : '' }} noreg"
                                        value="{{ $ppa->noreg }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }} namapasien"
                                    value="{{ $ppa->registrasi->pasien->NAMAPASIEN }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">No. RM</label>
                                <input type="text" name="norm"
                                    class="form-control {{ $errors->has('norm') ? 'is-invalid' : '' }} norm"
                                    value="{{ substr($ppa->registrasi->pasien->NOPASIEN,2) }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tempat / Tgl. Lahir</label>
                                <div class="input-group">
                                    <input type="text" name="tempat"
                                        class="form-control {{ $errors->has('tempat') ? 'is-invalid' : '' }} tempatlahir"
                                        value="{{ $ppa->registrasi->pasien->TMPLAHIR }}" readonly>
                                    <input type="text" name="tanggal"
                                        class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }} tanggallahir"
                                        value="{{ date('d M Y', strtotime($ppa->registrasi->pasien->TGLLAHIR)) }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat"
                                    class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }} alamat"
                                    value="{{ $ppa->registrasi->pasien->ALM1PASIEN }}" readonly>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted">[ Hasil Asesmen Pasien (SOAP) ]</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">S (Subject)</label>
                                <textarea name="s" id="" cols="30" rows="3" class="form-control {{ $errors->has('s') ? 'is-invalid' : '' }}">{{$ppa->s}}</textarea>
                                @if ($errors->has('s'))
                                    <div class="invalid-feedback">{{ $errors->first('s') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">O (Object)</label>
                                <textarea name="o" id="" cols="30" rows="3" class="form-control {{ $errors->has('o') ? 'is-invalid' : '' }}">{{$ppa->o}}</textarea>
                                @if ($errors->has('o'))
                                    <div class="invalid-feedback">{{ $errors->first('o') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">A (Assesment)</label>
                                <textarea name="a" id="" cols="30" rows="3" class="form-control {{ $errors->has('a') ? 'is-invalid' : '' }}">{{$ppa->a}}</textarea>
                                @if ($errors->has('a'))
                                    <div class="invalid-feedback">{{ $errors->first('a') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">P (Plan)</label>
                                <textarea name="p" id="" cols="30" rows="3" class="form-control {{ $errors->has('p') ? 'is-invalid' : '' }}">{{$ppa->p}}</textarea>
                                @if ($errors->has('p'))
                                    <div class="invalid-feedback">{{ $errors->first('p') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection