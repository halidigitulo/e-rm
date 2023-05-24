@extends('template.home')
@section('judul', 'Tambah Data Pemeriksaan Radiologi')
@section('content')
    <div class="col">
        <div class="card card-primary card-outline shadow">
            <div class="card-header">
                <div class="card-title">
                    <h5>Tambah Data Pemeriksaan</h5>
                </div>
                <div class="card-tools">
                    <a href="{{ url('f5/radiologi') }}" class="float-end btn btn-sm btn-warning"><i class="fas fa-undo"></i>
                        Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('radiologi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <p class="text-muted">[ Identitas Pasien ]</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Noreg</label>
                                <div class="input-group">
                                    <input type="text" name="noreg"
                                        class="form-control {{ $errors->has('noreg') ? 'is-invalid' : '' }} noreg"
                                        value="{{ old('noreg') }}" readonly>
                                    <div class="input-group-append ">
                                        <button class="btn btn-primary" type="button" data-toggle="modal"
                                            data-target="#noregRiModal">
                                            <i class="fas fa-bed fa-sm"></i>
                                            <button class="btn btn-success" type="button" data-toggle="modal"
                                                data-target="#noregModal">
                                                <i class="fas fa-wheelchair fa-sm"></i>
                                            </button>
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
                                <input type="text" name="namapasien" class="form-control namapasien"
                                    value="{{ old('namapasien') }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">No. RM</label>
                                <input type="text" name="norm" class="form-control norm" value="{{ old('norm') }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" name="jk" class="form-control jk" value="{{ old('jk') }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Umur</label>
                                <input type="text" name="umur" class="form-control umur" value="{{ old('umur') }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Pemeriksaan</label>
                                <input type="text" name="kodepmr"
                                    class="form-control kodepmr {{ $errors->has('kodepmr') ? 'is-invalid' : '' }}"
                                    value="{{ old('kodepmr') }}" readonly>
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
                                        value="{{ old('pmr') }}">
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
                                    value="{{ old('alamat') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dokter Pengirim</label>
                                <select name="kodedokter_kirim" id=""
                                    class="form-control select2 {{ $errors->has('kodedokter_kirim') ? 'is-invalid' : '' }}">
                                    <option value="" holder>-- Pilih Dokter --</option>
                                    @foreach ($dokter_kirim as $dokter)
                                        <option value="{{ $dokter->kode_ppa }}"
                                            {{ collect(old('kodedokter_kirim'))->contains($dokter->kode_ppa) ? 'selected' : '' }}>
                                            {{ $dokter->nama_ppa }}
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
                                    class="form-control {{ $errors->has('kodedokter_periksa') ? 'is-invalid' : '' }} select2">
                                    <option value="" holder>-- Pilih Dokter --</option>
                                    @foreach ($dokter_periksa as $dokter)
                                        <option value="{{ $dokter->KODEDOKTER }}"
                                            {{ collect(old('kodedokter_periksa'))->contains($dokter->KODEDOKTER) ? 'selected' : '' }}>
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
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Hasil Pemeriksaan</label>
                                <textarea name="isi" id="isi" cols="30" rows="20"
                                    class="form-control {{ $errors->has('isi') ? 'is-invalid' : '' }}" style="text-align: left">
                                {{ old('isi') }}
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
                                {{ old('kesimpulan') }}
                            </textarea>
                                @if ($errors->has('kesimpulan'))
                                    <div class="invalid-feedback">{{ $errors->first('kesimpulan') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" class="form-control" name="gambar">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-undo"></i>
                                Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan
                                Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal noreg -->
    <div class="modal fade" id="noregModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-search"></i> Cari Data Pasien
                        Rawat Jalan</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-hover table-striped table-sm" id="rajal">
                        <thead>
                            <tr>
                                <th>Noreg</th>
                                <th>Tgl Daftar</th>
                                <th>Nama Pasien</th>
                                <th>Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($noreg as $item)
                                <tr>
                                    <td>{{ $item->NOREG }}</td>
                                    <td>{{ date('d-M-Y', strtotime($item->TGLREG)) }}</td>
                                    <td>{{ $item->pasien->NAMAPASIEN }} - {{ $item->NOPASIEN }}</td>
                                    <td><a class="btn btn-link pilihnoreg" data-noreg="{{ $item->NOREG }}"
                                            data-nopasien="{{ $item->NOPASIEN }}"
                                            data-namapasien="{{ $item->pasien->NAMAPASIEN }}"
                                            data-jk="{{ $item->pasien->JNSKELAMIN }}"
                                            data-alamat="{{ $item->pasien->ALM1PASIEN }}"
                                            data-umur="{{ $item->UMURTH }}"
                                            data-namabagian="{{ $item->bagian->unit->NAMABAGIAN }}">{{ $item->bagian->unit->NAMABAGIAN }}</a>
                                    </td>
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

    <!-- Modal noreg RI-->
    <div class="modal fade" id="noregRiModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-search"></i> Cari Data Pasien
                        Rawat Inap</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-hover table-striped table-sm" id="ranap">
                        <thead>
                            <tr>
                                <th>Noreg</th>
                                <th>Tgl Daftar</th>
                                <th>Nama Pasien</th>
                                <th>Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($noregri as $item)
                                <tr>
                                    <td>{{ $item->NOREG }}</td>
                                    <td>{{ date('d-M-Y', strtotime($item->TGLREG)) }}</td>
                                    <td><a class="btn btn-link pilihnoregri" data-noreg="{{ $item->NOREG }}"
                                            data-nopasien="{{ $item->NOPASIEN }}"
                                            data-namapasien="{{ $item->pasien->NAMAPASIEN }}"
                                            data-jk="{{ $item->pasien->JNSKELAMIN }}"
                                            data-alamat="{{ $item->pasien->ALM1PASIEN }}"
                                            data-umur="{{ $item->UMURTH }}"
                                            {{-- data-namabagian="{{ $item->bagian->unit->NAMABAGIAN }}" --}}>{{ $item->pasien->NAMAPASIEN }} -
                                            {{ $item->NOPASIEN }}</a></td>
                                    <td></td>
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

    <!-- Modal pemeriksaan-->
    <div class="modal fade" id="pemeriksaanModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-search"></i> Cari Data
                        Pemeriksaan</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive-sm">
                    <table class="table table-hover table-striped table-sm" id="pemeriksaan">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Pemeriksaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemeriksaan as $item)
                                <tr>
                                    <td>{{ $item->KODEPMR }}</td>
                                    <td><a class="btn btn-link pilihpmr" data-kodepmr="{{ $item->KODEPMR }}"
                                            data-pmr="{{ $item->NAMAPMR }}">{{ $item->NAMAPMR }}</a></td>
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
@endsection

@push('script')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $('#pemeriksaan').DataTable(),
                $('#ranap').DataTable(),
                $('#rajal').DataTable({
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

    {{-- ambil data dari modal noreg --}}
    <script>
        $(document).ready(function() {
            $(document).on('click', '.pilihnoreg', function() {
                var noreg = $(this).data('noreg');
                var nopasien = $(this).data('nopasien');
                var namapasien = $(this).data('namapasien');
                var jk = $(this).data('jk');
                var alamat = $(this).data('alamat');
                var umur = $(this).data('umur');
                var namabagian = $(this).data('namabagian');

                $('.noreg').val(noreg);
                $('.norm').val(nopasien);
                $('.namapasien').val(namapasien);
                $('.jk').val(jk == 'L' ? 'Laki-laki' : 'Perempuan');
                $('.alamat').val(alamat);
                $('.umur').val(umur);
                $('.namabagian').val(namabagian);
                $('#noregModal').modal('hide');
            })
        });
    </script>

    {{-- ambil data dari modal noreg RI --}}
    <script>
        $(document).ready(function() {
            $(document).on('click', '.pilihnoregri', function() {
                var noreg = $(this).data('noreg');
                var nopasien = $(this).data('nopasien');
                var namapasien = $(this).data('namapasien');
                var jk = $(this).data('jk');
                var alamat = $(this).data('alamat');
                var umur = $(this).data('umur');
                var namabagian = $(this).data('namabagian');

                $('.noreg').val(noreg);
                $('.norm').val(nopasien);
                $('.namapasien').val(namapasien);
                $('.jk').val(jk == 'L' ? 'Laki-laki' : 'Perempuan');
                $('.alamat').val(alamat);
                $('.umur').val(umur);
                $('.namabagian').val(namabagian);
                $('#noregRiModal').modal('hide');
            })
        });
    </script>

    {{-- ambil data dari modal pemeriksaan --}}
    <script>
        $(document).ready(function() {
            $(document).on('click', '.pilihpmr', function() {
                var pmr = $(this).data('pmr');
                var kodepmr = $(this).data('kodepmr');

                $('.kodepmr').val(kodepmr);
                $('.pmr').val(pmr);
                $('#pemeriksaanModal').modal('hide');
            })
        });
    </script>

    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
        })
    </script>

    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#isi').summernote();
            $('#kesimpulan').summernote();
        });
    </script>
@endpush
