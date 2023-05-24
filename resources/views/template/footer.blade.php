            <div class="legal">
                <div class="copyright">
                    <small>[ Diakses menggunakan: <?php $ip = $_SERVER['REMOTE_ADDR'];
                    $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                    echo $ip . ' - ' . $hostname;
                    ?> ] </small>
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
        </aside>
     </section>

     <section class="content">
         <div class="container-fluid">
             <div class="block-header">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">
                            <i class="material-icons">home</i> Home
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);">
                            @yield('judul')
                        </a>
                    </li>
                </ol>
             </div>
             @yield('content')
         </div>
     </section>

     <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
     {{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> --}}
     {{-- <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> --}}
     <script src="{{ asset('/plugins/bootstrap/js/bootstrap.js') }}"></script>
     <script src="{{ asset('/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
     <script src="{{ asset('/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
     <script src="{{ asset('/plugins/node-waves/waves.js') }}"></script>
     <script src="{{ asset('/js/admin.js') }}"></script>
     <script src="{{ asset('/js/demo.js') }}"></script>
     <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
     @stack('script')
     <script>
         var timeoutTimer;
         var expireTime = 1000 * 60 * 5;

         function expireSession() {
             clearTimeout(timeoutTimer);
             timeoutTimer = setTimeout("IdleTimeout()", expireTime);
         }

         function IdleTimeout() {
             localStorage.setItem("logoutMessage", true);
             window.location.href = "{{ url('/logout') }}";
         }
         $(document).on('click mousemove scroll', function() {
             expireSession();
         });
         expireSession();
     </script>

     {{-- script reload page --}}
     <script>
         function reloadpage() {
             location.reload()
         }
     </script>
     </body>

     </html>
