<div class="row mb-3">
    <div class="col">
        <hr>
        <h6 class="text-center fw-bold">TERAPI PULANG</h6>
        <button type="button" class="btn btn-sm btn-success btn-tambah-obat" data-toggle="modal"
            data-target="#tambahObat"><i class="fas fa-plus"></i> Tambah Data Obat</button>
    </div>

    <div class="col-md-12 table-responsive mt-3">
        <table class="table table-sm table-hover table-striped">
            <thead>
                <tr>
                    <td>Nama Obat</td>
                    <td>Jumlah</td>
                    <td>Dosis</td>
                    <td>Frekuensi</td>
                    <td>Cara Pemberian</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody id="obat">

            </tbody>
        </table>
    </div>
</div>

{{-- tambah data obat --}}
<div class="modal fade" id="tambahObat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Obat</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="simpanForm_errList"></ul>
                <div class="col">
                    <label for="">Nama Obat</label>
                    <input type="text" class="form-control nama_obat">
                </div>
                <div class="col">
                    <label for="">Jumlah</label>
                    <input type="number" class="form-control jumlah">
                </div>
                <div class="col">
                    <label for="">Dosis</label>
                    <input type="text" class="form-control dosis">
                </div>
                <div class="col">
                    <label for="">Frekuensi</label>
                    <input type="text" class="form-control frekuensi">
                </div>
                <div class="col">
                    <label for="">Cara Pemberian</label>
                    <input type="text" class="form-control cara_pemberian">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary tambah_obat"><i class="fas fa-plus"></i>
                    Tambahkan</button>
            </div>
        </div>
    </div>
</div>

{{-- edit data obat --}}
<div class="modal fade" id="editObat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Obat</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="updateForm_errList"></ul>
                <input type="hidden" id="edit_obat_id">
                <div class="col">
                    <label for="">Nama Obat</label>
                    <input type="text" class="form-control" id="edit_nama_obat" name="nama_obat">
                </div>
                <div class="col">
                    <label for="">Jumlah</label>
                    <input type="number" class="form-control" id="edit_jumlah" name="jumlah">
                </div>
                <div class="col">
                    <label for="">Dosis</label>
                    <input type="text" class="form-control" id="edit_dosis" name="dosis">
                </div>
                <div class="col">
                    <label for="">Frekuensi</label>
                    <input type="text" class="form-control" id="edit_frekuensi" name="frekuensi">
                </div>
                <div class="col">
                    <label for="">Cara Pemberian</label>
                    <input type="text" class="form-control" id="edit_cara_pemberian" name="cara_pemberian">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary update_obat"><i class="fas fa-paper-plane"></i>
                    Update</button>
            </div>
        </div>
    </div>
</div>

{{-- delete obat --}}
<div class="modal fade" id="deleteObat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Obat</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="delete_obat_id" name="">
                <h5>Yakin ingin menghapus data ini?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger btn_delete_obat"><i class="fas fa-trash"></i>
                    Delete</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $(document).ready(function() {

            fetchData();

            // fetch data
            function fetchData(Request, noreg) {
                var url = window.location.href;
                var parts = url.split("/");
                // var last_part = parts[parts.length - 1];
                var last_part = $('.noreg').val();
                $.ajax({
                    type: "GET",
                    url: "/api/fetch-obat?noreg=" + last_part,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#obat').html("");
                        $.each(response.obat, function(key, item) {
                            $('#obat').append(
                                '<tr>\
                                                            <td>' + item.nama_obat + '</td>\
                                                            <td>' + item.jumlah + '</td>\
                                                            <td>' + item.dosis + '</td>\
                                                            <td>' + item.frekuensi + '</td>\
                                                            <td>' + item.cara_pemberian + '</td>\
                                                            <td>\
                                                                <button type="button" value="' + item.id + '" class="edit_obat btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>\
                                                                <button type="button" value="' + item.id + '" class="delete_obat btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>\
                                                            </td>\
                                                        </tr>\
                                                                     ')
                        });
                    }
                });
            }

            // tambah data
            $(document).on('click', '.tambah_obat', function(e) {
                e.preventDefault();
                var data = {
                    'noreg': $('.noreg').val(),
                    'nama_obat': $('.nama_obat').val(),
                    'jumlah': $('.jumlah').val(),
                    'dosis': $('.dosis').val(),
                    'frekuensi': $('.frekuensi').val(),
                    'cara_pemberian': $('.cara_pemberian').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/api/simpan-terapi-obat-resume",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#simpanForm_errList').html("");
                            $('#simpanForm_errList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#simpanForm_errList').append('<li>' + err_values +
                                    '</li>')
                            });
                        } else {
                            $('#simpanForm_errList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#tambahObat').modal('hide');
                            $('#tambahObat').find('input').val("");
                            fetchData();
                        }
                    }
                });
            });

            // edit data
            $(document).on('click', '.edit_obat', function(e) {
                e.preventDefault();
                var obat_id = $(this).val();
                $('#edit_obat_id').val(obat_id);
                $('#editObat').modal('show');
                $.ajax({
                    type: "get",
                    url: "/api/edit-terapi-obat-resume/" + obat_id,
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').html("");
                            $('#success_message').addClass("alert alert-danger");
                            $('#success_message').text(response.message);
                        } else {
                            $('#edit_nama_obat').val(response.obat.nama_obat);
                            $('#edit_jumlah').val(response.obat.jumlah);
                            $('#edit_dosis').val(response.obat.dosis);
                            $('#edit_frekuensi').val(response.obat.frekuensi);
                            $('#edit_cara_pemberian').val(response.obat.cara_pemberian);
                            $('#edit_obat_id').val(obat_id);
                        }
                    }
                });
            });

            // update data
            $(document).on('click', '.update_obat', function(e) {
                e.preventDefault();
                var obat_id = $('#edit_obat_id').val();
                var data = {
                    // 'noreg': $('#noreg').val(),
                    'nama_obat': $('#edit_nama_obat').val(),
                    'jumlah': $('#edit_jumlah').val(),
                    'dosis': $('#edit_dosis').val(),
                    'frekuensi': $('#edit_frekuensi').val(),
                    'cara_pemberian': $('#edit_cara_pemberian').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "put",
                    url: "/api/update-terapi-obat-resume/" + obat_id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        if (response.status == 400) {
                            $('#updateForm_errList').html("");
                            $('#updateForm_errList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#updateForm_errList').append('<li>' + err_values +
                                    '</li>')
                            });
                            $('.update_obat').text("Update");
                        } else if (response.status == 404) {
                            $('#updateForm_errList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.update_obat').text("Update");
                        } else {
                            $('#updateForm_errList').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editObat').modal('hide');
                            $('.update_obat').text("Update");
                            fetchData();
                        }
                    }
                });
            });

            // delete data
            $(document).on('click', '.delete_obat', function(e) {
                e.preventDefault();
                var obat_id = $(this).val();
                // alert(obat_id);
                $('#delete_obat_id').val(obat_id);
                $('#deleteObat').modal('show');
            });

            $(document).on('click', '.btn_delete_obat', function(e) {
                e.preventDefault();
                // $(this).text("Deleting...");
                var obat_id = $('#delete_obat_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "delete",
                    url: "/api/delete-terapi-obat-resume/" + obat_id,
                    success: function(response) {
                        // console.log(response);
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#deleteObat').modal('hide');
                        // $('.delete_obat').text("Delete");
                        fetchData();
                    }
                });
            });
        });
    </script>

    <script>
        $(function() {
            $('.noreg').keyup(function() {
                //Reference the Button.
                var btnSubmit = $('.btn-tambah-obat');

                //Verify the TextBox value.
                if ($('.noreg').val().trim() != '') {
                    //Enable the TextBox when TextBox has value.
                    btnSubmit.removeAttr('disabled');
                } else {
                    //Disable the TextBox when TextBox is empty.
                    btnSubmit.attr('disabled', 'disabled');
                }
            });
        });
    </script>
@endpush
