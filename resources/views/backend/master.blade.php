<!DOCTYPE html>
<html lang="en">
    <head>
        @include('backend.layout.library')
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            @include('backend.layout.header')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('backend.layout.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->
            @include('backend.layout.footer')


            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script type="text/javascript" src="{{ asset('backend/js/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script type="text/javascript" src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/dataTables.bootstrap4.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/dataTables.responsive.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/responsive.bootstrap4.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/dataTables.buttons.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/buttons.bootstrap4.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/jszip.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/pdfmake.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/vfs_fonts.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/buttons.html5.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/buttons.print.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/buttons.colVis.min.js') }}"></script>
        <!-- Link to Select2 JavaScript -->
        <script type="text/javascript" src="{{ asset('backend/js/select2.full.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/summernote-bs4.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script type="text/javascript" src="{{ asset('backend/js/demo.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/adminlte.min.js') }}"></script>


        <!-- Summernote Bootstrap 4 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.css">

        <!-- Load after jQuery and Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.js"></script>

        <script type="text/javascript">
            document.addEventListener('submit', async function (event) {
                const form = event.target.closest('.js-catalog-status-form');
                if (!form) return;

                event.preventDefault();
                const button = form.querySelector('.catalog-status-toggle');
                if (!button || button.disabled) return;

                button.disabled = true;

                try {
                    const response = await fetch(form.action, {
                        method: form.method || 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: new FormData(form),
                        credentials: 'same-origin'
                    });
                    const result = await response.json();
                    if (!response.ok) throw new Error(result.message || 'Could not update status.');

                    const isActive = Number(result.status) === 0;
                    button.classList.toggle('is-active', isActive);
                    button.classList.toggle('is-inactive', !isActive);
                    button.title = isActive ? 'Active' : 'Inactive';
                    button.setAttribute('aria-label', (isActive ? 'Active' : 'Inactive') + '. Click to ' + (isActive ? 'deactivate' : 'activate') + '.');

                    let notice = document.getElementById('catalog-status-notice');
                    if (!notice) {
                        notice = document.createElement('div');
                        notice.id = 'catalog-status-notice';
                        notice.className = 'alert alert-success alert-dismissible fade show';
                        notice.setAttribute('role', 'status');
                        notice.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;max-width:420px;';
                        document.body.appendChild(notice);
                    }
                    notice.textContent = result.message;
                    window.setTimeout(function () { notice.remove(); }, 4000);
                } catch (error) {
                    window.alert(error.message || 'Could not update status. Please try again.');
                } finally {
                    button.disabled = false;
                }
            });

            window.onload = function () {
                var alert = document.querySelector('.alert');
                if (alert) {
                    // Show the alert
                    alert.style.display = "block";

                    // Set timeout to hide the alert after 5 seconds (5000 milliseconds)
                    setTimeout(function () {
                        $(alert).alert('close');
                    }, 5000);
                }
            };
        </script>
        
        @yield('javaScript')        
    <!-- </body>
</html> -->
