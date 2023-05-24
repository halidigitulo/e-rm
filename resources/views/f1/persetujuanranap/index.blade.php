@extends('template.home')
@section('judul', 'Persetujuan Pasien Rawat Inap')
@section('content')
    @include('flash-toastr::message')
    <div class="col">
        <div class="card card-primary card-outline shadow">
            <div class="card-header">
                <div class="card-title">
                    <h5 class="text-gray-800">F1.3 Persetujuan Pasien Rawat Inap</h5>
                </div>
                <div class="card-tools">
                    <a href="{{ url('f1/persetujuanranap/create') }}" class="float-end btn btn-sm btn-success"><i
                            class="fas fa-plus"></i>
                        Tambah Data</a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Noreg</th>
                            <th>Nama Pasien - No RM</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Alamat</th>
                            <th>User</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($persetujuan as $result)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $result->noreg }}</td>
                                <td>{{ $result->registrasi->pasien->NAMAPASIEN }} -
                                    {{ substr($result->registrasi->pasien->NOPASIEN, 2) }}
                                </td>
                                <td>{{ $result->registrasi->pasien->TMPLAHIR }},
                                    {{ date('d M Y', strtotime($result->registrasi->pasien->TGLLAHIR)) }}</td>
                                <td>{{ $result->registrasi->pasien->ALM1PASIEN }}</td>
                                <td class="text-uppercase">{{ $result->user->name }}</td>
                                <td>
                                    <a href="{{ route('persetujuanranap.edit', $result->noreg) }}"
                                        class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-sm btn-success"><i class="fas fa-search"></i></a>
                                    <a href="" class="btn btn-sm btn-primary"><i class="fas fa-download"></i></a>
                                    <a href="#" persetujuanranap-id="{{ $result->id }}"
                                        class="btn btn-sm btn-danger delete">
                                        <form action="{{ route('persetujuanranap.delete', $result->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('plugins/sweetalert2/sweetalert.min.js') }}"></script>
    <script>
        $('.delete').click(function(e) {
            var persetujuanranap = $(this).attr('persetujuanranap-id')
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
                        window.location = '/f1/persetujuanranap/' + persetujuanranap + '/delete';
                    }
                })
        });
    </script>
@endpush
