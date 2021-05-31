<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('libs/ionicons/ionicons.min.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ url('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('adminlte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('adminlte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('adminlte/plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ url('libs/dropzone/dropzone.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="{{ url('libs/toastr/toastr.min.css') }}">
    <!-- Pace -->
    <link rel="stylesheet" type="text/css" href="{{ url('libs/pace/flash.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('libs/dataTables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ url('libs/dataTables/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('libs/dataTables/fixedHeader.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('libs/dataTables/responsive.bootstrap.min.css') }}">
    <style>
        .img-circular{
            width: 100px;
            height: 100px;
            background-size: cover;
            display: block;
            border-radius: 100px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
        }
    </style>

    @stack('header')
</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse" style="height: auto;">
    <div class="wrapper" id="app">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link sidebar-toggle-btn" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <div class="user-panel mt-1 pb-2 d-flex">
                        <div class="image">
                            @if (auth()->user()->foto)
                            <img src="https://sikep.mahkamahagung.go.id/uploads/foto_pegawai/{{ auth()->user()->foto }}" class="img-circle img-circular elevation-2" alt="User Image">
                            @else
                            <img src="{{ asset('img/avatar.jpg') }}" class="img-circle img-circular elevation-2" alt="User Image">
                            @endif
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{ auth()->user()->name ?? 'No Name' }}</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <p>
                            <i class="nav-icon fas fa-power-off"></i>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <span class="brand-text font-weight-light">e-Persuratan</span>
            </a>

            <!-- Sidebar -->
            @component('adminlte/components/sidebar')

            @endcomponent
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 399px;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">
                                @yield('header')
                            </h1>
                            @yield('nav-buttons')
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @include('partials.alert')
                    <!-- Main row -->
                    <div class="row">
                        @yield('content')
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="https://renog.mahkamahagung.go.id">Biro Perencanaan dan Organisasi
                    (at) Mahkamah Agung</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 0.1.2
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- <div id="sidebar-overlay"></div> -->
    </div>
    <!-- ./wrapper -->
    @stack('modal')

    <!-- jQuery -->
    <script src="{{ url('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ url('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ url('adminlte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ url('adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/moment/id.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ url('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('adminlte/dist/js/adminlte.js') }}"></script>
    <!-- Validate -->
    <script src="{{ url('libs/underscore/underscore-min.js') }}"></script>
    <script src="{{ url('adminlte/dist/js/validate.min.js') }}"></script>
    <!-- SweetAlert -->
    <script src="{{ url('libs/sweetalert/sweetalert2@10.js') }}"></script>
    <!-- Dropzone -->
    <script src="{{ url('libs/dropzone/dropzone.min.js') }}"></script>
    <!-- PDF Object -->
    <script src="{{ url('libs/pdfobject/pdfobject.min.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ url('libs/jquery/jquery.validate.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ url('libs/toastr/toastr.min.js') }}"></script>
    <!-- Pace -->
    {{-- <script src="{{ url('libs/pace/pace.min.js') }}"></script> --}}
    <!-- DataTables -->
    <script src="{{ url('libs/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('libs/dataTables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('libs/dataTables/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ url('libs/dataTables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('libs/dataTables/responsive.bootstrap.min.js') }}"></script>
    <script src="{{ url('libs/bootbox/bootbox.min.js') }}"></script>
    <script src="{{ url('js/libs.js') }}"></script>
    @stack('js_script')
    <script type="text/javascript">
        $(function() {
            // $('.sidebar-toggle-btn').hide();
            @stack('inner_js_script')
        });

    </script>
    @stack('footer')
    <link rel="stylesheet" href="{{ url('css/eoffice.css') }}">
    <!-- <script src="{{ url('js/eoffice.js') }}"></script> -->
    <div class="overlay"></div>
</body>

</html>
