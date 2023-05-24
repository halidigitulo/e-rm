@extends('template.home')
@section('judul', 'Edit Data Resume Medis')
@section('content')
    @include('flash-message')
    <div class="col">
        <div class="card card-primary card-outline shadow">
            <div class="card-header">
                <div class="card-title">
                    <h5>Edit Data Resume Medis </h5>
                </div>
                <div class="card-tools">
                    <a href="{{ url('f8/resume') }}" class="float-end btn btn-sm btn-warning"><i class="fas fa-undo"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('resume.update', $resume->noreg) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row mt-3">
                        <h6>Identitas Pasien</h6>
                        <div class="col-sm-6 mb-3">
                            <label for="">Noreg</label>
                            <div class="input-group">
                                <input type="text" id="noreg" name="noreg"
                                    class="form-control {{ $errors->has('noreg') ? 'is-invalid' : '' }} noreg"
                                    value="{{ $resume->noreg }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="">Nama</label>
                            <input type="text" name="nama"
                                class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }} namapasien"
                                value="{{ $resume->registrasi->pasien->NAMAPASIEN }}" readonly>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="">No. RM</label>
                            <input type="text" name="norm"
                                class="form-control {{ $errors->has('norm') ? 'is-invalid' : '' }} norm"
                                value="{{ substr($resume->registrasi->pasien->NOPASIEN, 2) }}" readonly>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="">Tempat / Tgl. Lahir</label>
                            <div class="input-group">
                                <input type="text" name="tempat"
                                    class="form-control {{ $errors->has('tempat') ? 'is-invalid' : '' }} tempatlahir"
                                    value="{{ $resume->registrasi->pasien->TMPLAHIR }}" readonly>
                                <input type="text" name="tanggal"
                                    class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }} tanggallahir"
                                    value="{{ date('d M Y', strtotime($resume->registrasi->pasien->TGLLAHIR)) }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <label for="">Tanggal Masuk</label>
                            <input type="date" class="form-control" name="tgl_masuk" value="{{ $resume->tgl_masuk }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Tanggal Keluar / Meninggal</label>
                            <input type="date" class="form-control" name="tgl_keluar" value="{{ $resume->tgl_keluar }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Ruangan</label>
                            <select name="ruangan" id="" class="form-control">
                                <option value="" holder>-- Pilih Kelas Rawat --</option>
                                <option value="std-c" @if ($resume->ruangan == 'std-c') selected @endif>Standar C</option>
                                <option value="std-b" @if ($resume->ruangan == 'std-b') selected @endif>Standar B</option>
                                <option value="std-a" @if ($resume->ruangan == 'std-a') selected @endif>Standar A</option>
                                <option value="vip" @if ($resume->ruangan == 'vip') selected @endif>VIP</option>
                                <option value="suite" @if ($resume->ruangan == 'suite') selected @endif>Suite Room</option>
                                <option value="president" @if ($resume->ruangan == 'president') selected @endif>President Suite
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Penanggung Biaya</label>
                            <select name="penanggung_biaya" id="" class="form-control">
                                <option value="" holder>-- Pilih Penanggung Biaya --</option>
                                <option value="pribadi" @if ($resume->penanggung_biaya == 'pribadi') selected @endif>Pribadi</option>
                                <option value="perusahaan" @if ($resume->penanggung_biaya == 'perusahaan') selected @endif>Perusahaan</option>
                                <option value="bpjs" @if ($resume->penanggung_biaya == 'bpjs') selected @endif>BPJS</option>
                                <option value="asuransi" @if ($resume->penanggung_biaya == 'asuransi') selected @endif>Asuransi</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Diagnosa Masuk RS</label>
                            <input type="text" class="form-control" name="diagnosa_masuk"
                                value="{{ $resume->diagnosa_masuk }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Ringkasan Riwayat Penyakit</label>
                            <textarea name="riwayat" id="" cols="30" rows="3" class="form-control">{{ $resume->riwayat }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Pemeriksaan Fisik</label>
                            <textarea name="pemeriksaan_fisik" id="" cols="30" rows="3" class="form-control">{{ $resume->pemeriksaan_fisik }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Pemeriksaan Penunjang / Diagnostik Terpenting</label>
                            <textarea name="pemeriksaan_penunjang" id="" cols="30" rows="3" class="form-control">{{ $resume->pemeriksaan_penunjang }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Terapi / Pengobatan selama di RS</label>
                            <textarea name="terapi" id="" cols="30" rows="3" class="form-control">{{ $resume->terapi }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Hasil Konsultasi</label>
                            <textarea name="hasil_konsultasi" id="" cols="30" rows="3" class="form-control">{{ $resume->hasil_konsultasi }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Diagnosa Utama</label>
                            <div class="input-group">
                                <input type="text" name="kode_diagnosa_utama"
                                    class="form-control kode_diagnosa_utama {{ $errors->has('kode_diagnosa_utama') ? 'is-invalid' : '' }} "
                                    value="{{ $resume->kode_diagnosa_utama }}" readonly>
                                <div class="input-group-append ">
                                    <button class="btn btn-primary" type="button" data-toggle="modal"
                                        data-target="#icdModal">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                                <input type="text" name="diagnosa" class="form-control diagnosa" readonly
                                    >
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            @include('extra.diagnosa-sekunder')
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Alergi</label>
                            <textarea name="alergi" id="" cols="30" rows="3" class="form-control">{{ $resume->alergi }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Hasil Laboratorium</label>
                            <textarea name="laboratorium" id="" cols="30" rows="3" class="form-control">{{ $resume->laboratorium }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Diet</label>
                            <textarea name="diet" id="" cols="30" rows="3" class="form-control">{{ $resume->diet }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Instruksi / Anjuran dan edukasi (follow up)</label>
                            <textarea name="instruksi" id="" cols="30" rows="3" class="form-control">{{ $resume->instruksi }}</textarea>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Kondisi waktu keluar</label>
                            <select name="kondisi_keluar" id="" class="form-control">
                                <option value="" holder>-- Kondisi Keluar --</option>
                                <option value="1" @if ($resume->kondisi_keluar == '1') selected @endif>Sembuh</option>
                                <option value="2" @if ($resume->kondisi_keluar == '2') selected @endif>Pindah RS</option>
                                <option value="3" @if ($resume->kondisi_keluar == '3') selected @endif>Pulang APS</option>
                                <option value="4" @if ($resume->kondisi_keluar == '4') selected @endif>Meninggal</option>
                                <option value="5" @if ($resume->kondisi_keluar == '5') selected @endif>Lain-lain</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Cara Keluar</label>
                            <select name="cara_keluar" id="" class="form-control">
                                <option value="" holder>-- Cara Keluar --</option>
                                <option value="1" @if ($resume->cara_keluar == '1') selected @endif>Persetujuan Dokter
                                </option>
                                <option value="2" @if ($resume->cara_keluar == '2') selected @endif>Pulang paksa
                                </option>
                                <option value="3" @if ($resume->cara_keluar == '3') selected @endif>Dirujuk ke RS lain
                                </option>
                                <option value="4" @if ($resume->cara_keluar == '4') selected @endif>Melarikan diri
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Pengobatan dilanjutkan ke</label>
                            <select name="pengobatan_lanjutan" id="" class="form-control">
                                <option value="" holder>-- Pengobatan Lanjutan --</option>
                                <option value="1" @if ($resume->pengobatan_lanjutan == '1') selected @endif>Rawat Jalan RSHK
                                </option>
                                <option value="2" @if ($resume->pengobatan_lanjutan == '2') selected @endif>RS Lain</option>
                                <option value="3" @if ($resume->pengobatan_lanjutan == '3') selected @endif>Puskesmas</option>
                                <option value="4" @if ($resume->pengobatan_lanjutan == '4') selected @endif>Dokter Luar</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Tanggal Kontrol Poliklinik</label>
                            <input type="date" class="form-control" name="tgl_kontrol"
                                value="{{ $resume->tgl_kontrol }}">
                        </div>
                        @include('extra.obat-pulang')
                    </div>
                    <button tyoe="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
