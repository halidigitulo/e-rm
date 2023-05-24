@extends('template.home')
@section('judul', 'Data User')
@section('content')
    <div id="success_message"></div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h5><i class="fas fa-users"></i> Data User</h5>
                </div>
                <div class="card-tools">
                    <a href="#" data-toggle="modal" data-target="#tambahUser" class="float-end btn btn-sm btn-success"><i
                            class="fas fa-plus"></i>
                        Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>Email</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- tambah user --}}
    <div class="modal fade" id="tambahUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-5" id="exampleModalLabel">Tambah Data User</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul id="simpanForm_errList"></ul>
                    <div class="form-group mb-3">
                        <label for="">User Name</label>
                        <input type="text" class="form-control name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="text" class="form-control email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary tambah_user"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>

    {{-- edit user --}}
    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-5" id="exampleModalLabel">Edit Data User</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul id="updateForm_errList"></ul>
                    <input type="hidden" id="edit_user_id">
                    <div class="form-group mb-3">
                        <label for="">User Name</label>
                        <input type="text" id="edit_name" class="form-control name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="text" id="edit_email" class="form-control email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <input type="password" id="edit_password" class="form-control password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_user"><i class="fas fa-paper-plane"></i>
                        Update</button>
                </div>
            </div>
        </div>
    </div>

    {{-- delete user --}}
    <div class="modal fade" id="deleteUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-5" id="exampleModalLabel">Delete Data User</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete_user_id" name="">
                    <h5>Yakin ingin menghapus data ini?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn_delete_user"><i class="fas fa-trash"></i>
                        Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {

            fetchUser();

            function fetchUser() {
                $.ajax({
                    type: "GET",
                    url: "/fetch-users",
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        $('tbody').html("");
                        $.each(response.users, function(key, item) {
                            $('tbody').append(
                                '<tr>\
                                                                        <td>' + item.id + '</td>\
                                                                        <td>' + item.name + '</td>\
                                                                        <td>' + item.email + '</td>\
                                                                        <td>\
                                                                            <button type="button" value="' + item.id + '" class="edit_user btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>\
                                                                            <button type="button" value="' + item.id + '" class="delete_user btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>\
                                                                            <button type="button" value="' + item.id + '" class="qrcode btn btn-sm btn-primary"><i class="fas fa-qrcode"></i></button>\
                                                                        </td>\
                                                                    </tr>'
                            )
                        });
                    }
                });
            }

            $(document).on('click', '.edit_user', function(e) {
                e.preventDefault();
                var user_id = $(this).val();
                // console.log(user_id);
                $('#editUser').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-user/" + user_id,
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').html("");
                            $('#success_message').addClass("alert alert-danger");
                            $('#success_message').text(response.message);
                        } else {
                            $('#edit_name').val(response.user.name);
                            $('#edit_email').val(response.user.email);
                            $('#edit_password').val(response.user.password);
                            $('#edit_user_id').val(user_id);
                        }
                    }
                });
            });

            $(document).on('click', '.update_user', function(e) {
                e.preventDefault();
                $(this).text("Updating...");
                var user_id = $('#edit_user_id').val();
                var data = {
                    'name': $('#edit_name').val(),
                    'email': $('#edit_email').val(),
                    'password': $('#edit_password').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/update-user/" + user_id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 400) {
                            // errors
                            $('#updateForm_errList').html("");
                            $('#updateForm_errList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#updateForm_errList').append('<li>' + err_values +
                                    '</li>')
                            });
                            $('.update_user').text("Update");

                        } else if (response.status == 404) {
                            $('#updateForm_errList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.update_user').text("Update");
                        } else {
                            $('#updateForm_errList').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editUser').modal('hide');
                            $('.update_user').text("Update");
                            fetchUser();
                        }
                    }
                });
            });

            $(document).on('click', '.tambah_user', function(e) {
                e.preventDefault();
                var data = {
                    'name': $('.name').val(),
                    'email': $('.email').val(),
                    'password': $('.password').val(),
                }
                // console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/user",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
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
                            $('#tambahUser').modal('hide');
                            $('#tambahUser').find('input').val("");
                            fetchUser();
                        }
                    }
                });
            });

            $(document).on('click', '.delete_user', function(e) {
                e.preventDefault();
                var user_id = $(this).val();
                // alert(user_id);
                $('#delete_user_id').val(user_id);
                $('#deleteUser').modal('show');
            });

            $(document).on('click', '.btn_delete_user', function(e) {
                e.preventDefault();
                $(this).text("Deleting...");
                var user_id = $('#delete_user_id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "delete",
                    url: "/delete-user/" + user_id,
                    success: function(response) {
                        // console.log(response);
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#deleteUser').modal('hide');
                        $('.delete_user').text("Delete");
                        fetchUser();
                    }
                });
            });
        });
    </script>
@endpush
