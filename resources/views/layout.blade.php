<!DOCTYPE html>
<html>

<head>
    <title>Management Gudang PT Intan Pariwara</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0e263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="/dashboard/vendors/feather/feather.css">
    <link rel="stylesheet" href="/dashboard/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/dashboard/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="/dashboard/js/select.dataTables.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="/dashboard/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="/dashboard/images/favicon.png" />
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <!-- Plugin JS -->
    <script src="/dashboard/vendors/js/vendor.bundle.base.js"></script>
    <script src="/dashboard/vendors/chart.js/Chart.min.js"></script>
    <script src="/dashboard/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="/dashboard/js/dataTables.select.min.js"></script>
    <!-- Main JS -->
    <script src="/dashboard/js/off-canvas.js"></script>
    <script src="/dashboard/js/hoverable-collapse.js"></script>
    <script src="/dashboard/js/template.js"></script>
    <script src="/dashboard/js/settings.js"></script>
    <script src="/dashboard/js/todolist.js"></script>
    <!-- Custom JS untuk halaman ini -->
    <script src="/dashboard/js/dashboard.js"></script>
    <script src="/dashboard/js/Chart.roundedBarCharts.js"></script>
    <style>
        @media print {
            title {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="mt-5 col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            @include('layouts.sidebar')
        </nav>
        <!-- /Sidebar -->

        <div class="content-wrapper col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <!-- Navbar -->
            @include('layouts.navbar')
            <!-- /Navbar -->

            <!-- Konten Utama -->
            <main role="main" class="pt-3">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
            <!-- /Konten Utama -->
        </div>
    </div>

    <!-- jQuery dan Bootstrap JS -->

</body>

</html>
