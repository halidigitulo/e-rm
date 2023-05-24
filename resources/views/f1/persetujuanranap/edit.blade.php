@extends('template.home')
@section('judul', 'Tambah Data Harapan Pasien')
@section('content')
    <div class="col">
        <div class="card card-primary card-outline shadow">
            <div class="card-header">
                <div class="card-title">
                    <h5 class="text-gray-800">Edit Data Persetujuan Pasien Ranap</h5>
                </div>
                <div class="card-tools">
                    <a href="{{ url('f1/persetujuanranap') }}" class="float-end btn btn-sm btn-warning"><i
                            class="fas fa-undo"></i>
                        Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('persetujuanranap.update', $persetujuan->noreg) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <h6 class="text-muted">[ Identitas Pasien ]</h6>
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Noreg</label>
                                <div class="input-group">
                                    <input type="text" name="noreg"
                                        class="form-control {{ $errors->has('noreg') ? 'is-invalid' : '' }} noreg"
                                        value="{{ $persetujuan->noreg }}" readonly>
                                    <div class="input-group-append ">
                                    </div>
                                    @if ($errors->has('noreg'))
                                        <div class="invalid-feedback">{{ $errors->first('noreg') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }} namapasien"
                                    value="{{ $persetujuan->registrasi->pasien->NAMAPASIEN }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="">No. RM</label>
                            <input type="text" name="norm"
                                class="form-control {{ $errors->has('norm') ? 'is-invalid' : '' }} norm"
                                value="{{ substr($persetujuan->registrasi->pasien->NOPASIEN, 2) }}" readonly>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tempat / Tgl. Lahir</label>
                                <div class="input-group">
                                    <input type="text" name="tempat"
                                        class="form-control {{ $errors->has('tempat') ? 'is-invalid' : '' }} tempatlahir"
                                        value="{{ $persetujuan->registrasi->pasien->TMPLAHIR }}" readonly>
                                    <input type="text" name="tanggal"
                                        class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }} tanggallahir"
                                        value="{{ date('d M Y', strtotime($persetujuan->registrasi->pasien->TGLLAHIR)) }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted">[ Data Penanggung Jawab ]</h6>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama"
                                    value="{{ $persetujuan->pj_nama }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">No. Hp</label>
                                <input type="number" class="form-control" name="nohp"
                                    value="{{ $persetujuan->pj_hp }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="alamat"
                                    value="{{ $persetujuan->pj_alamat }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">No. KTP / ID</label>
                                <input type="number" class="form-control" name="ktp"
                                    value="{{ $persetujuan->pj_ktp }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select name="agama" id="" class="form-control select2">
                                    <option value="" holder>-- Pilih Agama --</option>
                                    <option value="islam" @if ($persetujuan->pj_agama == 'islam') selected @endif>Islam</option>
                                    <option value="protesten" @if ($persetujuan->pj_agama == 'protestan') selected @endif>Protesten
                                    </option>
                                    <option value="katolik" @if ($persetujuan->pj_agama == 'katolik') selected @endif>Katolik
                                    </option>
                                    <option value="hindu" @if ($persetujuan->pj_agama == 'hindu') selected @endif>Hindu</option>
                                    <option value="budha" @if ($persetujuan->pj_agama == 'budha') selected @endif>Budha</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="">Pendidikan</label>
                                <select name="pendidikan" id="" class="form-control select2">
                                    <option value="" holder>-- Pilih Pendidikan --</option>
                                    <option value="1" @if ($persetujuan->pj_pendidikan == '1') selected @endif>SD</option>
                                    <option value="2" @if ($persetujuan->pj_pendidikan == '2') selected @endif>SMP</option>
                                    <option value="3" @if ($persetujuan->pj_pendidikan == '3') selected @endif>SMA</option>
                                    <option value="4" @if ($persetujuan->pj_pendidikan == '4') selected @endif>Diploma
                                    </option>
                                    <option value="5" @if ($persetujuan->pj_pendidikan == '5') selected @endif>Sarjana
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <p>Dengan ini menyatakan dengan sesungguhnya bahwa saya setuju untuk dilakukan rawat inap di RS.
                        Harapan Keluarga: </p>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Ruangan</label>
                                <select name="ruangan" id="" class="form-control select2">
                                    <option value="" holder>-- Pilih Ruangan --</option>
                                    <option value="angsana" @if ($persetujuan->ruangan == 'angsana') selected @endif>Angsana
                                    </option>
                                    <option value="mahoni" @if ($persetujuan->ruangan == 'mahoni') selected @endif>Mahoni
                                    </option>
                                    <option value="palem" @if ($persetujuan->ruangan == 'palem') selected @endif>Palem
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Kelas Perawatan</label>
                                <select name="kelas_rawat" id="" class="form-control select2">
                                    <option value="" holder>-- Pilih Kelas Rawat --</option>
                                    <option value="std-c" @if ($persetujuan->kelas_rawat == 'std-c') selected @endif>Standar C
                                    </option>
                                    <option value="std-b" @if ($persetujuan->kelas_rawat == 'std-b') selected @endif>Standar B
                                    </option>
                                    <option value="std-a" @if ($persetujuan->kelas_rawat == 'std-a') selected @endif>Standar A
                                    </option>
                                    <option value="vip" @if ($persetujuan->kelas_rawat == 'vip') selected @endif>VIP</option>
                                    <option value="suite" @if ($persetujuan->kelas_rawat == 'suite') selected @endif>Suite Room
                                    </option>
                                    <option value="president" @if ($persetujuan->kelas_rawat == 'president') selected @endif>President
                                        Suite
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Pernah dirawat sebelumnya?</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <input type="checkbox" name="pernah_rawat" id="pernah_rawat"
                                                {{ $persetujuan->pernah_rawat !== null ? 'checked' : '' }}>
                                        </span>
                                    </div>

                                    <input type="text" class="form-control" name="tahun_rawat" placeholder="Tahun"
                                        value="{{ $persetujuan->pernah_rawat }}" id="tahun_rawat"
                                        {{ $persetujuan->pernah_rawat !== null ? '' : 'disabled' }}>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="">Penanggung Biaya</label>
                                <select name="penanggung_biaya" id="" class="form-control select2">
                                    <option value="" holder>-- Pilih Penanggung Biaya --</option>
                                    <option value="pribadi" @if ($persetujuan->penanggung_biaya == 'pribadi') selected @endif>Pribadi
                                    </option>
                                    <option value="perusahaan" @if ($persetujuan->penanggung_biaya == 'perusahaan') selected @endif>
                                        Perusahaan
                                    </option>
                                    <option value="bpjs" @if ($persetujuan->penanggung_biaya == 'bpjs') selected @endif>BPJS
                                    </option>
                                    <option value="asuransi" @if ($persetujuan->penanggung_biaya == 'asuransi') selected @endif>Asuransi
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h6>Nama & Alamat Keluarga terdekat</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="namakeluarga"
                                    value="{{ $persetujuan->nama_keluarga }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="alamatkeluarga"
                                    value="{{ $persetujuan->alamat_keluarga }}">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Catatan</label>
                                <textarea name="catatan" id="" cols="30" rows="3" class="form-control">{{ $persetujuan->catatan }}</textarea>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#pernyataan"><i class="fas fa-info-circle"></i> Pernyataan</a>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tanda Tanda Penanggung Jawab <sup
                                        class="text-danger">*</sup></label><br>
                                <div id="sigpj" class="form-control mb-3"></div><br>
                                <button id="clear" class="btn btn-sm btn-danger"><i class="fas fa-eraser"></i>
                                    Bersihkan</button><br>
                                <textarea name="signed_pj" id="signature_pj" style="display: none"></textarea>
                                <img src="{{ $persetujuan->pj_paraf }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i>
                        Update</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Pernyataan-->
    <div class="modal fade" id="pernyataan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-5" id="exampleModalLabel">Pernyataan</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <p>Demi kelancaran pelayanan perawatan, pengobatan dan administrasi, dengan ini juga menyatakan :</p>
                    <ol>
                        <li>Setuju dan memberi ijin kepada dokter yang bersangkutan untuk merawat saya / pasien tersebut
                            diatas</li>
                        <li>Dengan ini menyatakan dengan sesungguhnya bahwa seluruh pembiayaan pelayanan di RSHK Mataram
                            akan saya bayarkan secara UMUM / BPJS / ASURANSI * dan bersedia untuk melengkapi berkas
                            kelengkapnya. Apabila dalam waktu <span class="fw-bold">3x24 jam tidak dapat menunjukkan Kartu
                                / Kelengkapan</span> lainnya, maka Saya siap untuk membayarkan semua pelayanan dan tindakan
                            di Rumah Sakit Harapan Kelaurga Mataram sebagai <span class="fw-bold">Pasien Umum</span></li>
                        <li>Telah menyetujui dan bersedia mentaati segala peraturan yang berlaku di RSHK Mataram</li>
                        <li>Memberi kuasa kepada dokter Rumah Sakit untuk memberikan keterangan yang diperlukan oleh pihak
                            penanggung biaya perawatan saya / pasien tersebut diatas.</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Setuju</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $("input[name='pernah_rawat']").click(function() {
                if ($("#pernah_rawat").is(":checked")) {
                    $("#tahun_rawat").removeAttr("disabled");
                    $("#tahun_rawat").focus();
                } else {
                    $("#tahun_rawat").attr("disabled", "disabled");
                    $("#tahun_rawat").attr("visibility", "hidden");
                }
            });
        });
    </script>
    
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
