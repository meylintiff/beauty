<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beauty Skincare</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/bootstrap/css/bootstrap.css') }}">
    <!-- Datatables -->
    <!-- <link rel="stylesheet" href="{{ url('AdminLTE/plugins/datatables-colreorder/css/colReorder.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/datatables-searchbuilder/css/searchBuilder.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/datatables-searchpanes/css/searchPanes.bootstrap4.min.css') }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('AdminLTE/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ url('AdminLTE/dist/css/dashboard.css') }}">

    <link href="{{ asset('AdminLTE/dist/img/logo.png') }}" rel="icon">

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('layout.navbar')
        @include('layout.sidebar')
        @yield('content')
        @include('layout.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- datatables -->
    <!-- <script src="{{ url('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('AdminLTE/plugins/datatables-searchbuilder/js/searchBuilder.bootstrap4.min.js') }}"></script>
    <script src="{{ url('AdminLTE/plugins/datatables-searchpanes/js/searchPanes.bootstrap4.min.js') }}"></script>
    <script src="{{ url('AdminLTE/plugins/datatables-colreorder/js/colReorder.bootstrap4.min.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('AdminLTE/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ url('AdminLTE/dist/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                searching: true,
                ordering: true,
                paging: true
            });
        });
        $(document).ready(function() {
            $('#example2').DataTable({
                searching: true,
                ordering: true,
                paging: true
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('darkModeToggle');
            const sidebar = document.querySelector('.main-sidebar');
            const navbar = document.querySelector('.main-header');
            const cardHeaders = document.querySelectorAll('.card-header'); // Menggunakan NodeList
            const buttons = document.querySelectorAll('.btn');
            const navlinks = document.querySelectorAll('.nav-link.active');
            const tables = document.querySelectorAll('.table');

            // Function to set theme based on localStorage
            const setTheme = () => {
                const theme = localStorage.getItem('theme');
                if (theme === 'dark') {
                    document.body.classList.add('dark-mode');
                    if (sidebar) sidebar.classList.replace('sidebar-light-primary', 'sidebar-dark-primary');
                    if (navbar) navbar.classList.replace('navbar-light', 'navbar-dark');
                    cardHeaders.forEach(cardHeader => {
                        cardHeader.classList.replace('bg-dark', 'bg-warning'); // Perbaikan
                    });
                    buttons.forEach(button => {
                        button.classList.remove('btn-outline-dark');
                        button.classList.add('btn-outline-warning');
                    });
                    navlinks.forEach(navlink => {
                        navlink.classList.remove('bg-dark');
                        navlink.classList.add('bg-warning');
                    });
                    tables.forEach(table => {
                        table.classList.remove('table-secondary');
                        table.classList.add('table-dark');
                    });
                    toggle.checked = true;
                } else {
                    document.body.classList.remove('dark-mode');
                    if (sidebar) sidebar.classList.replace('sidebar-dark-primary', 'sidebar-light-primary');
                    if (navbar) navbar.classList.replace('navbar-dark', 'navbar-light');
                    cardHeaders.forEach(cardHeader => {
                        cardHeader.classList.replace('bg-warning', 'bg-dark'); // Perbaikan
                    });
                    buttons.forEach(button => {
                        button.classList.remove('btn-outline-warning');
                        button.classList.add('btn-outline-dark');
                    });
                    navlinks.forEach(navlink => {
                        navlink.classList.remove('bg-warning');
                        navlink.classList.add('bg-dark');
                    });
                    tables.forEach(table => {
                        table.classList.remove('table-dark');
                        table.classList.add('table-secondary');
                    });
                    toggle.checked = false;
                }
            };

            // Set initial theme on page load
            setTheme();

            // Toggle theme when checkbox changes
            toggle.addEventListener('change', () => {
                if (toggle.checked) {
                    localStorage.setItem('theme', 'dark');
                } else {
                    localStorage.setItem('theme', 'light');
                }
                setTheme();
            });
        });
    </script>

</body>

</html>