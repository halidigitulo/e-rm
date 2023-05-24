@extends('template.home')
@section('judul', 'General Consent')
@section('content')
    @include('flash-toastr::message')

    <div class="col">
        <div class="card">
            <div class="header">
                <h5> <a href="{{ url('f1/generalconsent/create') }}" class="btn btn-sm btn-link bg-green">
                        <span class="material-icons">add</span></a> F1.2 General Consent</h5>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm js-basic-example dataTable">
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
                        @forelse ($general as $result)
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
                                    <a href="{{ route('generalconsent.edit', $result->noreg) }}"
                                        class="btn btn-link"><i
                                            class="material-icons">mode_edit</i></a>
                                    <a href=""
                                        class="btn btn-link"><span
                                            class="material-icons">file_download</span></a>
                                    <a href=""
                                        class="btn btn-link"><span
                                            class="material-icons">info</span></a>
                                    <a href="#" general-id="{{ $result->id }}"
                                        class="btn btn-link delete">
                                        <span class="material-icons">delete</span>
                                        <form action="{{ route('generalconsent.delete', $result->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
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

@push('style')
    <link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@push('script')
    <script src="{{ asset('vendor/sweetalert2/sweetalert.min.js') }}"></script>
    <script>
        $('.delete').click(function(e) {
            var general = $(this).attr('general-id')
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
                        window.location = '/f1/generalconsent/' + general + '/delete';
                    }
                })
        });
    </script>
    <script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>

    <script type="text/javascript">
        $('.number').countTo();
    </script>
