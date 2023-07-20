<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laundry System</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card p-3 m-3">
                            <div class="card-heading">
                                <div class="card-title pl-3">Receipt of Transaction</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <span>Customer Name: </span> John Doe
                                </div>
                                <div>
                                    <span>Employee Name: </span> EJohn Doe
                                </div>
                                <div>
                                    <span>Laundry Type: </span> Smock
                                </div>
                                <div>
                                    <span>Weight: </span> 20lbs
                                </div>
                                <div>
                                    <span>Order date: </span> 20/02/23
                                </div>
                                <div>
                                    <span>Finish date: </span> 20/02/23
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
            <div class="m-2 float-right d-none d-sm-inline-block">
                <b>LaundryService</b>
            </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    {{-- @include('partials.scripts') --}}

    {{-- @yield('scripts') --}}

    @livewireScripts
</body>

</html>
