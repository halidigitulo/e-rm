<div class="row mb-3">
    <div class="col">
        <h6>Diagnosa Sekunder</h6>
        <button type="button" class="btn btn-sm btn-success btn-tambah-diagnosa" data-toggle="modal"
            data-target="#tambahDiagnosa"><i class="fas fa-plus"></i> Tambah Data Diagnosa</button>
    </div>
    <label for="">Kode ICD</label>
    <select name="kode_icd[]" id="" class="form-control select2" multiple="multiple">
        @foreach ($icd as $item)
            <option value="{{ $item->kddiagnosa }}">{{ $item->kddiagnosa }}</option>
        @endforeach

    </select>
    <div class="col-md-12 table-responsive mt-3 mb-3">
        <table class="table table-sm table-hover table-striped">
            <thead>
                <tr>
                    <td>Kode Diagnosa</td>
                    <td>Diagnosa</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody id="diagnosa">

            </tbody>
        </table>
    </div>

    {{-- tambah data diagnosa --}}
    <div class="modal fade" id="tambahDiagnosa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Diagnosa</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- <table class="table table-hover table-striped table-sm" id="icd">
                        <thead>
                            <tr>
                                <th>Kode Diagnosa</th>
                                <th>Nama Diagnosa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($icd as $item)
                                <tr>
                                    <td class="kode_diagnosa">{{ $item->kddiagnosa }}</a>
                                    </td>
                                    <td><a class="btn btn-link">{{ $item->namadiagnosa }}</td>
                                    <td><a href="" class="btn btn-success tambah_diagnosa"><i
                                                class="fas-fa-plus"></i>
                                            Tambahkan</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {

            fetchDataDiagnosa();

            function fetchDataDiagnosa(Request, noreg) {
                var url = window.location.href;
                var parts = url.split("/");
                // var last_part = parts[parts.length - 1];
                var last_part = $('.noreg').val();

                $.ajax({
                    type: "GET",
                    url: "/api/fetch-diagnosa?noreg=" + last_part,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#diagnosa').html("");
                        $.each(response.diagnosa, function(key, item) {
                            $('#diagnosa').append(
                                '<tr>\
                                    <td>' + item.kode_diagnosa + '</td>\
                                    <td></td>\
                                    <td>\
                                        <button type="button" value="' + item.id + '" class="edit_diagnosa btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>\
                                                                                <button type="button" value="' + item.id + '" class="delete_diagnosa btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>\
                                        </td>\
                                </tr>\
                                ')
                        });
                    }
                });
            }
        });

        $(document).on('click', '.tambah_diagnosa', function(e) {
            e.preventDefault();
            var data = {
                'noreg': $('.noreg').val(),
                'kode_diagnosa': $('.kode_diagnosa').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/api/simpan-diagnosa",
                data: data,
                dataType: "json",
                success: function(response) {
                    $('#tambahDiagnosa').modal('hide');
                    $('#tambahDiagnosa').find('input').val("");
                    fetchDataDiagnosa();
                }
            });
        });
    </script>

    {{-- <script>
        $(function() {
            $('#icd').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "rowGroup": true,
            });
        });
    </script> --}}
@endpush
