@extends('template.home')
@section('judul', 'Edit Data CPPT')
@section('content')
    @include('flash-message')
    <div class="col">
        <div class="card card-primary card-outline shadow">
            <div class="card-header">
                <div class="card-title">
                    <h5 class="text-gray-800">Edit Data CPPT </h5>
                </div>
                <div class="card-tools">
                    <a href="{{ url('f4/cppt') }}" class="float-end btn btn-sm btn-warning"><i class="fas fa-undo"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('cppt.update', $cppt->noreg) }}" method="post">
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
                                        value="{{ $cppt->noreg }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }} namapasien"
                                    value="{{ $cppt->registrasi->pasien->NAMAPASIEN }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">No. RM</label>
                                <input type="text" name="norm"
                                    class="form-control {{ $errors->has('norm') ? 'is-invalid' : '' }} norm"
                                    value="{{ substr($cppt->registrasi->pasien->NOPASIEN, 2) }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tempat / Tgl. Lahir</label>
                                <div class="input-group">
                                    <input type="text" name="tempat"
                                        class="form-control {{ $errors->has('tempat') ? 'is-invalid' : '' }} tempatlahir"
                                        value="{{ $cppt->registrasi->pasien->TMPLAHIR }}" readonly>
                                    <input type="text" name="tanggal"
                                        class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }} tanggallahir"
                                        value="{{ date('d M Y', strtotime($cppt->registrasi->pasien->TGLLAHIR)) }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat"
                                    class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }} alamat"
                                    value="{{ $cppt->registrasi->pasien->ALM1PASIEN }}" readonly>
                            </div>
                        </div>
                    </div>
                    <h6>Hasil Asesmen Pasien, Analisis, Rencana Penatalaksaan pasien dan Pemberian Pelayanan <span class="bg-danger">(Dituliskan dengan format SOAP)</span></h6>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Profesional Pemberi Asuhan (PPA)</label>
                                <select name="ppa" id="" class="form-control">
                                    <option value=""holder>-- Pilih PPA --</option>
                                    <option value="dokter" @if ($cppt->ppa == 'dokter') selected @endif>Dokter</option>
                                    <option value="perawat" @if ($cppt->ppa == 'perawat') selected @endif>Perawat</option>
                                    <option value="bidan" @if ($cppt->ppa == 'bidan') selected @endif>Bidan</option>
                                    <option value="radiografer" @if ($cppt->ppa == 'radiografer') selected @endif>Radiografer</option>
                                    <option value="fisioterapis" @if ($cppt->ppa == 'fisioterapis') selected @endif>Fisioterapis</option>
                                    <option value="apoteker" @if ($cppt->ppa == 'apoteker') selected @endif>Apoteker</option>
                                    <option value="gizi" @if ($cppt->ppa == 'gizi') selected @endif>Ahli gizi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">S (Subject)</label>
                                <textarea name="s" id="" cols="30" rows="3" class="form-control">{{ $cppt->s }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">O (Object)</label>
                                <textarea name="o" id="" cols="30" rows="3" class="form-control">{{ $cppt->o }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">A (Assesment)</label>
                                <textarea name="a" id="" cols="30" rows="3" class="form-control">{{ $cppt->a }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">P (Planning)</label>
                                <textarea name="p" id="" cols="30" rows="3" class="form-control">{{ $cppt->p }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Instruksi PPA</label>
                                <textarea name="instruksi" id="" cols="30" rows="3" class="form-control">{{ $cppt->instruksi }}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection