@extends('template.home')
@section('judul', 'Tambah Data Resume Medis')
@section('content')
    <div class="col">
        <div class="card card-primary card-outline shadow">
            <div class="card-header">
                <div class="card-title">
                    <h5>Tambah Data Resume Medis </h5>
                </div>
                <div class="card-tools">
                    <a href="{{ url('f8/resume') }}" class="float-end btn btn-sm btn-warning"><i class="fas fa-undo"></i>
                        Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('resume.store') }}" method="post">
                    @csrf
                    <div class="row mt-3">
                        <h6>Identitas Pasien</h6>
                        <div class="col-sm-6 mb-3">
                            <label for="">Noreg</label>
                            <div class="input-group">
                                <input type="text" name="noreg"
                                    class="form-control {{ $errors->has('noreg') ? 'is-invalid' : '' }} noreg"
                                    value="{{ old('noreg') }}" readonly>
                                <div class="input-group-append ">
                                    <button class="btn btn-primary" type="button" data-toggle="modal"
                                        data-target="#noregModal">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                                @if ($errors->has('noreg'))
                                    <div class="invalid-feedback">{{ $errors->first('noreg') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="">Nama</label>
                            <input type="text" name="nama"
                                class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }} namapasien"
                                value="{{ old('nama') }}" readonly>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="">No. RM</label>
                            <input type="text" name="norm"
                                class="form-control {{ $errors->has('norm') ? 'is-invalid' : '' }} norm"
                                value="{{ old('norm') }}" readonly>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="">Tempat / Tgl. Lahir</label>
                            <div class="input-group">
                                <input type="text" name="tempat"
                                    class="form-control {{ $errors->has('tempat') ? 'is-invalid' : '' }} tempatlahir"
                                    value="{{ old('tempat') }}" readonly>
                                <input type="text" name="tanggal"
                                    class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }} tanggallahir"
                                    value="{{ old('tanggal') }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <label for="">Tanggal Masuk</label>
                            <input type="date" class="form-control {{ $errors->has('tgl_masuk') ? 'is-invalid' : '' }}"
                                name="tgl_masuk">
                            @if ($errors->has('tgl_masuk'))
                                <div class="invalid-feedback">{{ $errors->first('tgl_masuk') }}</div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Tanggal Keluar / Meninggal</label>
                            <input type="date" class="form-control {{ $errors->has('tgl_keluar') ? 'is-invalid' : '' }}"
                                name="tgl_keluar">
                            @if ($errors->has('tgl_keluar'))
                                <div class="invalid-feedback">{{ $errors->first('tgl_keluar') }}</div>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Ruangan</label>
                            <select name="ruangan" id="" class="form-control select2">
                                <option value="" holder>-- Pilih Kelas Rawat --</option>
                                <option value="std-c">Standar C</option>
                                <option value="std-b">Standar B</option>
                                <option value="std-a">Standar A</option>
                                <option value="vip">VIP</option>
                                <option value="suite">Suite Room</option>
                                <option value="president">President Suite</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Penanggung Biaya</label>
                            <select name="penanggung_biaya" id="" class="form-control select2">
                                <option value="" holder>-- Pilih Penanggung Biaya --</option>
                                <option value="pribadi">Pribadi</option>
                                <option value="perusahaan">Perusahaan</option>
                                <option value="bpjs">BPJS</option>
                                <option value="asuransi">Asuransi</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Diagnosa Masuk RS</label>
                            <input type="text" class="form-control" name="diagnosa_masuk">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Ringkasan Riwayat Penyakit</label>
                            <textarea name="riwayat" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Pemeriksaan Fisik</label>
                            <textarea name="pemeriksaan_fisik" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Pemeriksaan Penunjang / Diagnostik Terpenting</label>
                            <textarea name="pemeriksaan_penunjang" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Terapi / Pengobatan selama di RS</label>
                            <textarea name="terapi" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Hasil Konsultasi</label>
                            <textarea name="hasil_konsultasi" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Diagnosa Utama</label>
                            <div class="input-group">
                                <input type="text" name="kode_diagnosa_utama"
                                    class="form-control kode_diagnosa_utama {{ $errors->has('kode_diagnosa_utama') ? 'is-invalid' : '' }} "
                                    value="{{ old('kode_diagnosa_utama') }}" readonly>
                                <div class="input-group-append ">
                                    <button class="btn btn-primary" type="button" data-toggle="modal"
                                        data-target="#icdModal">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                                <input type="text" name="diagnosa" class="form-control diagnosa" readonly>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            @include('extra.diagnosa-sekunder')
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Alergi</label>
                            <textarea name="alergi" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Hasil Laboratorium</label>
                            <textarea name="laboratorium" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Diet</label>
                            <textarea name="diet" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Instruksi / Anjuran dan edukasi (follow up)</label>
                            <textarea name="instruksi" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Kondisi waktu keluar</label>
                            <select name="kondisi_keluar" id="" class="form-control select2">
                                <option value="" holder>-- Kondisi Keluar --</option>
                                <option value="1">Sembuh</option>
                                <option value="2">Pindah RS</option>
                                <option value="3">Pulang APS</option>
                                <option value="4">Meninggal</option>
                                <option value="5">Lain-lain</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Cara Keluar</label>
                            <select name="cara_keluar" id="" class="form-control select2">
                                <option value="" holder>-- Cara Keluar --</option>
                                <option value="1">Persetujuan Dokter</option>
                                <option value="2">Pulang paksa</option>
                                <option value="3">Dirujuk ke RS lain</option>
                                <option value="4">Melarikan diri</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Pengobatan dilanjutkan ke</label>
                            <select name="pengobatan_lanjutan" id="" class="form-control select2">
                                <option value="" holder>-- Pengobatan Lanjutan --</option>
                                <option value="1">Rawat Jalan RSHK</option>
                                <option value="2">RS Lain</option>
                                <option value="3">Puskesmas</option>
                                <option value="4">Dokter Luar</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Tanggal Kontrol Poliklinik</label>
                            <input type="date" class="form-control" name="tgl_kontrol">
                        </div>
                        @include('extra.obat-pulang')
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <button type="reset" class="btn btn-sm btn-warning"><i class="fas fa-undo"></i> Reset</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Noreg --}}
    <div class="modal fade" id="noregModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-5" id="exampleModalLabel">Cari Data Pasien</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-hover table-striped table-sm" id="pasien">
                        <thead>
                            <tr>
                                <th>Tgl Daftar</th>
                                <th>Noreg</th>
                                <th>Nama Pasien</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($noreg as $item)
                                <tr>
                                    <td>{{ date('d-M-Y', strtotime($item->TGLREG)) }}</td>
                                    <td><a class="pilihnoreg btn btn-link" data-noreg="{{ $item->NOREG }}"
                                            data-nopasien="{{ $item->NOPASIEN }}"
                                            data-namapasien="{{ $item->pasien->NAMAPASIEN }}"
                                            data-tmplahir="{{ $item->pasien->TMPLAHIR }}"
                                            data-tgllahir="{{ $item->pasien->TGLLAHIR }}"
                                            data-jk="{{ $item->pasien->JNSKELAMIN }}"
                                            data-alamat="{{ $item->pasien->ALM1PASIEN }}">{{ $item->NOREG }}</a>
                                    </td>
                                    <td>{{ $item->pasien->NAMAPASIEN }} - {{ $item->NOPASIEN }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @include('modal.icd')
@endsection
@push('script')
    {{-- ambil data dari modal noreg --}}
    <script>
        $(document).ready(function() {
            $(document).on('click', '.pilihnoreg', function() {
                var noreg = $(this).data('noreg');
                var nopasien = $(this).data('nopasien');
                var namapasien = $(this).data('namapasien');
                var tmplahir = $(this).data('tmplahir');
                var tgllahir = $(this).data(('tgllahir'));
                var jk = $(this).data('jk');
                var alamat = $(this).data('alamat');

                $('.noreg').val(noreg);
                $('.norm').val(nopasien);
                $('.namapasien').val(namapasien);
                $('.tempatlahir').val(tmplahir);
                $('.tanggallahir').val(tgllahir);
                $('.jk').val(jk == 'L' ? 'Laki-laki' : 'Perempuan');
                $('.alamat').val(alamat);
                $('#noregModal').modal('hide');
            });
        });
    </script>

    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $('#pasien').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "rowGroup": true,
            });
        });
    </script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
        })
    </script>
@endpush
