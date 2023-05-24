<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | e-RM RS Harapan Keluarga</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="{{ asset('/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/plugins/node-waves/waves.css" ') }}rel="stylesheet" />
    <link href="{{ asset('/plugins/animate-css/animate.css" ') }}rel="stylesheet" />
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>
@include('flash-toastr::message')

<body class="login-page bg-teal">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">e-<b>RM</b></a>
            <small>RS. Harapan Keluarga</small>
        </div>
        <div class="card">
            <div class="body">
                <div class="msg">Silakan masukkan username dan password</div>
                <form action="/login" method="post">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">mail</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Email" required
                                autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-teal waves-effect" type="submit"><i class="material-icons">lock_open</i> Login</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="{{ url('/loginotp') }}">Login dengan OTP</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/plugins/node-waves/waves.js') }}"></script>
    <script src="{{ asset('/plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('/js/admin.js') }}"></script>
    <script src="{{ asset('/js/pages/examples/sign-in.js') }}"></script>
</body>

</html>
