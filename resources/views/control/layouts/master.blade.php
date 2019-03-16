<!DOCTYPE html>
<html lang="{{ $lang }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Control</title>

    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" id="bscss">
    <!-- =============== DATATABLE STYLES ===============-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <!-- =============== PAGE VENDOR STYLES ===============-->
    @yield('css')
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" id="maincss">


</head>
<body>


<div class="wrapper">
    <!-- top navbar-->
    <header class="topnavbar-wrapper">
        <!-- START Top Navbar-->
        <nav class="navbar topnavbar justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#signout">
                        <em class="fa fa-sign-out-alt"></em>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- END Top Navbar-->
    </header>
    <!-- sidebar-->
    <aside class="aside-container">
        <!-- START Sidebar (left)-->
        <div class="aside-inner">
            <nav class="sidebar">
                <!-- START sidebar nav-->
                <ul class="sidebar-nav">

                    <!-- START logo-->
                    <li class="logo">
                        <a href="#" title="#">
                            <img src="https://ui-avatars.com/api/?background=fff&color=000&name=Logo&length=4&font-size=0.33&bold=true" alt="">
                        </a>
                    </li>
                    <!-- END logo -->

                    <!-- START user info-->
                    <li class="avatar">
                        <!-- User picture-->
                        <a href="#" title="#">
                            <img src="https://ui-avatars.com/api/?rounded=true&name=John+Doe" alt="Jone Doe">
                        </a>
                    </li>
                    <!-- END user info -->

                    <!-- Iterates over all sidebar items-->
                    <li class="active">
                        <a href="#">
                            <em class="fa fa-users"></em>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <em class="fa fa-book"></em>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <em class="fa fa-pen-nib"></em>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <em class="fas fa-book-open"></em>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <em class="fas fa-book-reader"></em>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <em class="fas fa-map-marked-alt"></em>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <em class="fas fa-swatchbook"></em>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <em class="far fa-images"></em>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <em class="fas fa-cogs"></em>
                        </a>
                    </li>
                </ul>
                <!-- END sidebar nav-->
            </nav>
        </div>
        <!-- END Sidebar (left)-->
    </aside>
    <!-- Main section-->
    <section class="section-container">
        <!-- Page content-->
        @yield('content')
    </section>
    <!-- Page footer-->
    <footer class="footer-container">
        <div class="d-flex justify-content-between align-items-center">
            <span>{{ date('Y') }} &copy; E-Commerce website made with &nbsp;<i class="fas fa-heart"></i>.</span>
            <span class="float-right">V1.0.1</span>
        </div>
    </footer>
</div>

<!-- =============== VENDOR SCRIPTS ===============-->
<!-- MODERNIZR-->
<script src="{{ asset('assets/vendor/modernizr/modernizr.custom.js') }}"></script>
<!-- JQUERY-->
<script src="{{ asset('assets/vendor/jquery/dist/jquery.js') }}"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<!-- BOOTSTRAP-->
<script src="{{ asset('assets/vendor/popper.js/dist/umd/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.js') }}"></script>
<!-- =============== PAGE VENDOR SCRIPTS ===============-->
@yield('js')
<!-- =============== APP SCRIPTS ===============-->
<script src="{{ asset('assets/js/app.js') }}"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</body>
</html>
