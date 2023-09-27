<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Smart Perpus | @yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- css datatables -->
    <link rel="stylesheet" href="/assets/jquery.dataTables.css" />

    <!-- Custom styles for this template-->
    <link href="/../css/sb-admin-2.min.css" rel="stylesheet">

    {{-- CSS multiple select2 --}}
    <link rel="stylesheet" href="/css/select2.min.css">

</head>
@if (!isset($isAuthPage))

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            @include('partials.sidebar')
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    @include('partials.navbar')
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    @yield('content')
                    <!-- End Page Content -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>



        <!-- Bootstrap core JavaScript-->
        <script src="/vendor/jquery/jquery.min.js"></script>
        {{-- <script src="/js/jquery-3.6.1.min.js"></script> --}}
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="/js/demo/chart-area-demo.js"></script>
        <script src="/js/demo/chart-pie-demo.js"></script>

        <!-- DataTables -->
        <script src="/assets/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('.datatab').DataTable();
            });
        </script>

        {{-- Script JS multiple select2 --}}
        <script src="/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select-multiple').select2();
            });
        </script>

    </body>
@else
    @yield('content')
@endif

</html>
