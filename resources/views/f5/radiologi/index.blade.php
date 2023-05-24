@extends('template.home')
@section('judul', 'Data Pemeriksaan Radiologi')
@section('content')
@include('flash-toastr::message')
<div class="col">
    <div class="card card-primary card-outline shadow">
        <div class="card-header">
            <div class="card-title">
                <h6>Hasil Pemeriksaan Radiologi</h6>
            </div>
            <div class="card-tools">
                <a href="{{ url('f5/radiologi/create') }}" class="float-end btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah
                    Data</a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover table-sm table-striped table-bordered" id="radiologi">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tgl Periksa</th>
                        <th>Noreg</th>
                        <th>Nama Pasien</th>
                        <th>Pemeriksaan</th>
                        <th>Hasil</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($hasil as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>{{ $item->noreg }}</td>
                            <td>{{ $item->registrasi->pasien->NAMAPASIEN }} - {{ substr($item->registrasi->pasien->NOPASIEN,2) }}</td>
                            <td>
                                @if ($item->pemeriksaan)
                                    {{ $item->pemeriksaan->NAMAPMR }}
                                @endif
                            </td>
                            <td>{{ $item->isi }}</td>
                            <td>
                                @if ($item->gambar)
                                    <a href="{{ asset($item->gambar) }}" target="_blank">
                                        <img src="{{ asset($item->gambar) }}" class="img-thumbnail"
                                            style="max-width: 150px"></a>
                                @else
                                    <p>Belum ada gambar terupload</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('f5/radiologi/' . $item->noreg) }}" class="btn btn-sm btn-info" target="_blank"><i
                                        class="fas fa-search"></i> </a>
                                <a href="" class="btn btn-sm btn-success"><i class="fas fa-download"></i> </a>
                                <a href="{{url('f5/radiologi/'. $item->noreg.'/edit')}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> </a>
                                <a href="#" expertise-id="{{ $item->id }}" class="btn btn-sm btn-danger delete">
                                    <form action="{{ route('radiologi.delete', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('script')
    <script>
        $(function() {
            $('#radiologi').DataTable({
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

@push('swal')
    <script src="{{ asset('vendor/sweetalert2/sweetalert.min.js') }}"></script>
    <script>
        $('.delete').click(function(e) {
            var expertise = $(this).attr('expertise-id')
            // alert(unit_id);

            swal({
                    title: 'Warning',
                    text: 'Yakin akan hapus data ini?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    //  console.log(willDelete);
                    if (willDelete) {
                        window.location = '/radiologi/' + expertise + '/delete';
                    }
                })
        });
    </script>
@endpush
