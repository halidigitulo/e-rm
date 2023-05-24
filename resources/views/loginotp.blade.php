<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>e-RM - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: rgba(0, 0, 0, .8);
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body class="bg-gradient-danger">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="p-3">
                            <div class="text-center">
                                <h1 class="h6 text-gray-900 mb-4">Masukkan No. HP</h1>
                            </div>
                            <div class="alert alert-danger" id="error" style="display: none;"></div>
                            <div class="alert alert-success" id="successAuth" style="display: none;"></div>
                            <form>
                                <input type="text" id="number" class="form-control" placeholder="+62 ********">
                                <div id="recaptcha-container" class="mt-2"></div>
                                <button type="button" class="btn btn-primary mt-3 w-100" onclick="sendOTP();">Send
                                    OTP</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <h1 class="h6 text-gray-900 mb-4">Masukkan Kode Verifikasi</h1>
                            </div>
                            <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                            <form>
                                <input type="text" id="verification" class="form-control"
                                    placeholder="Verification code">
                                <button type="button" class="btn btn-success mt-3 w-100" onclick="verify()">Verify
                                    code</button>
                            </form>
                        </div>
                        <p class="text-center">Kembali ke Halaman <a href="/login">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyBmWt5GLloaBjOrGoc_AfhDvGOZClz8PL8",
            authDomain: "e-rm-otp.firebaseapp.com",
            projectId: "e-rm-otp",
            storageBucket: "e-rm-otp.appspot.com",
            messagingSenderId: "467526828655",
            appId: "1:467526828655:web:1b082e873d3087ad2bc39a",
            measurementId: "G-LXM2HZ6RWQ"
        };
        firebase.initializeApp(firebaseConfig);
    </script>

    <script type="text/javascript">
        window.onload = function() {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }

        function sendOTP() {
            var number = $("#number").val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                $("#successAuth").text("Message sent");
                $("#successAuth").show();
            }).catch(function(error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }

        function verify() {
            var code = $("#verification").val();
            coderesult.confirm(code).then(function(result) {
                var user = result.user;
                console.log(user);
                // $("#successOtpAuth").text("Auth is successful");
                window.location.href = '{{ route('dashboard') }}';
                // $("#successOtpAuth").show();
            }).catch(function(error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
    </script>

</body>

</html>
