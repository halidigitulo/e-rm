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
                                        class="form-control {{ $errors->has('noreg') ? 'is-invalid' : '' }} noreg"
                                        value="{{ old('noreg') }}"
                                        readonly>
                                    <div class="input-group-append ">
                                        <button class="btn btn-primary" type="button" data-toggle="modal"
                                            data-target="#noregRajalModal">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                    @if ($errors->has('noreg'))
                                        <div class="invalid-feedback">{{ $errors->first('noreg') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }} namapasien"
                                    value="{{ old('nama') }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="">No. RM</label>
                                <input type="text" name="norm"
                                    class="form-control {{ $errors->has('norm') ? 'is-invalid' : '' }} norm"
                                    value="{{ old('norm') }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
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
                        <div class="col mb-3">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat"
                                    class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }} alamat"
                                    value="{{ old('alamat') }}" readonly>
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

    <!-- Modal noreg Rajal-->
    <div class="modal fade" id="noregRajalModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-5" id="exampleModalLabel">Cari Data Pasien Rajal</p>
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
                var tgllahir = $(this).data('tgllahir');
                var jk = $(this).data('jk');
                var alamat = $(this).data('alamat');

                $('.noreg').val(noreg);
                $('.norm').val(nopasien);
                $('.namapasien').val(namapasien);
                $('.tempatlahir').val(tmplahir);
                $('.tanggallahir').val(tgllahir);
                $('.jk').val(jk == 'L' ? 'Laki-laki' : 'Perempuan');
                $('.alamat').val(alamat);
                $('#noregRajalModal').modal('hide');
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
@endpush
