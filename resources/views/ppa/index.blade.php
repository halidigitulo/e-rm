@extends('template.home')
@section('judul', 'Data PPA (Professional Pemberi Asuhan)')
@section('content')
    <div id="success_message"></div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h5><i class="fas fa-user-md"></i> Data PPA</h5>
                </div>
                <div class="card-tools">
                    <a href="#" data-toggle="modal" data-target="#tambahPpa" class="float-end btn btn-sm btn-success"><i
                            class="fas fa-plus"></i>
                        Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped" id="ppa">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kode</td>
                            <td>Nama</td>
                            <td>Jabatan</td>
                            <td>QR Code</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ppa as $result)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $result->kode_ppa }}</td>
                                <td>{{ $result->nama_ppa }}</td>
                                <td>{{ $result->jenis_ppa }}</td>
                                <td> {!! DNS2D::getBarcodeHTML("$result->nama_ppa", 'QRCODE') !!} </td>
                                {{-- <td> <img src="{!! QrCode::format('png')->generate('Embed me into an e-mail!') !!}"></td> --}}
                                <td><a href="{{ route('qrcode', $result->id) }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-qrcode"></i></a>
                                    <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- tambah PPA --}}
    <div class="modal fade" id="tambahPpa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data PPA</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('ppa.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="">Kode PPA</label>
                            <select name="kode_ppa" id="" class="form-control">
                                @foreach ($dokter as $dokter)
                                    <option value="{{ $dokter->KODEDOKTER }}"
                                        {{ collect(old('kode_ppa'))->contains($dokter->KODEDOKTER) ? 'selected' : '' }}>
                                        {{ $dokter->NAMADOKTER }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Nama PPA</label>
                            <input type="text" class="form-control" name="nama_ppa">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Jabatan</label>
                            <select name="jenis_ppa" id="" class="form-control">
                                <option value="1">Dokter Spesialis</option>
                                <option value="2">Dokter Umum</option>
                                <option value="3">Perawat</option>
                                <option value="4">Bidan</option>
                                <option value="5">Apoteker</option>
                                <option value="6">Dietisen Gizi</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $('#ppa').DataTable({
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
