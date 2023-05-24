@extends('template.home')
@section('judul', 'Edit Data Pemeriksaan Radiologi')
@section('content')
    @include('flash-message')
    <div class="col">
        <div class="card card-primary card-outline shadow">
            <div class="card-header">
                <div class="card-title">
                    <h5>Edit Data Pemeriksaan Radiologi </h5>
                </div>
                <div class="card-tools">
                    <a href="{{ url('f5/radiologi') }}" class="float-end btn btn-sm btn-warning"><i class="fas fa-undo"></i>
                        Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('radiologi.update', $radiologi->noreg) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <p class="text-muted">[ Identitas Pasien ]</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Noreg</label>
                                <div class="input-group">
                                    <input type="text" name="noreg"
                                        class="form-control {{ $errors->has('noreg') ? 'is-invalid' : '' }} noreg"
                                        value="{{ $radiologi->noreg }}" readonly>
                                </div>
                                @if ($errors->has('noreg'))
                                    <div class="invalid-feedback">{{ $errors->first('noreg') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="namapasien" class="form-control namapasien"
                                    value="{{ $radiologi->registrasi->pasien->NAMAPASIEN }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">No. RM</label>
                                <input type="text" name="norm" class="form-control norm"
                                    value="{{ substr($radiologi->registrasi->pasien->NOPASIEN, 2) }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" name="jk" class="form-control jk"
                                    value="{{ $radiologi->registrasi->pasien->JNSKELAMIN == 'L' ? 'Laki-laki' : 'Perempuan' }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Umur</label>
                                <input type="text" name="umur" class="form-control umur" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Pemeriksaan</label>
                                <input type="text" name="kodepmr"
                                    class="form-control kodepmr {{ $errors->has('kodepmr') ? 'is-invalid' : '' }}"
                                    value="{{ $radiologi->pemeriksaan->KODEPMR }}" readonly>
                                @if ($errors->has('kodepmr'))
                                    <div class="invalid-feedback">{{ $errors->first('kodepmr') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">-</label>
                                <div class="input-group">
                                    <input type="text" name="pmr" class="form-control small pmr" readonly
                                        value="{{ $radiologi->pemeriksaan->NAMAPMR }}">
                                    <div class="input-group-append ">
                                        <button class="btn btn-primary" type="button" data-toggle="modal"
                                            data-target="#pemeriksaanModal">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control alamat"
                                    value="{{ $radiologi->registrasi->pasien->ALM1PASIEN }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dokter Pengirim</label>
                                <select name="kodedokter_kirim" id=""
                                    class="form-control {{ $errors->has('kodedokter_kirim') ? 'is-invalid' : '' }}">
                                    <option value="" holder>-- Pilih Dokter --</option>
                                    @foreach ($dokter_kirim as $dokter)
                                        <option value="{{ $dokter->KODEDOKTER }}"
                                            @if ($dokter->KODEDOKTER == $radiologi->kodedokter_kirim) selected @endif>
                                            {{ $dokter->NAMADOKTER }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('kodedokter_kirim'))
                                    <div class="invalid-feedback">{{ $errors->first('kodedokter_kirim') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dokter Periksa</label>
                                <select name="kodedokter_periksa" id=""
                                    class="form-control {{ $errors->has('kodedokter_periksa') ? 'is-invalid' : '' }}">
                                    <option value="" holder>-- Pilih Dokter --</option>
                                    @foreach ($dokter_periksa as $dokter)
                                        <option value="{{ $dokter->KODEDOKTER }}"
                                            @if ($dokter->KODEDOKTER == $radiologi->kodedokter_periksa) selected @endif>
                                            {{ $dokter->NAMADOKTER }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('kodedokter_periksa'))
                                    <div class="invalid-feedback">{{ $errors->first('kodedokter_periksa') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <p class="text-muted">[ Hasil Pemeriksaan ]</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Hasil Pemeriksaan</label>
                                <textarea name="isi" id="isi" cols="30" rows="20"
                                    class="form-control {{ $errors->has('isi') ? 'is-invalid' : '' }}" style="text-align: left">
                                    {{ $radiologi->isi }}
                                </textarea>
                                @if ($errors->has('isi'))
                                    <div class="invalid-feedback">{{ $errors->first('isi') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Kesimpulan</label>
                                <textarea name="kesimpulan" id="kesimpulan" cols="30" rows="5"
                                    class="form-control {{ $errors->has('kesimpulan') ? 'is-invalid' : '' }}" style="text-align: left">
                                    {{ $radiologi->kesimpulan }}
                                </textarea>
                                @if ($errors->has('kesimpulan'))
                                    <div class="invalid-feedback">{{ $errors->first('kesimpulan') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" class="form-control mb-3" name="gambar">
                                @if ($radiologi->gambar)
                                    <img src="{{ asset($radiologi->gambar) }}" alt="" class="img-thumbnail">
                                @else
                                    <div class="alert alert-danger text-center">Belum ada foto terupaload</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-paper-plane"></i>
                                Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#isi').summernote();
            $('#kesimpulan').summernote();
        });
    </script>
@endpush
