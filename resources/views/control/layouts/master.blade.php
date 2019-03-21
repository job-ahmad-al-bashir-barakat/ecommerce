<!DOCTYPE html>
<html lang="{{ $lang }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Control</title>

    <link rel="icon" type="image/x-icon" href="https://ui-avatars.com/api/?background=000&color=fff&name=LO&length=4&font-size=0.6&bold=true">
    <!-- =============== VENDOR STYLES ===============-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,400italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/amiri.css">
    <link rel="stylesheet" href="{{ mix('css/control.css') }}">
    <!-- =============== PAGE VENDOR STYLES ===============-->
    @yield('css')
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
        <!-- START Sidebar-->
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
        <!-- END Sidebar-->
    </aside>
    <!-- Main section-->
    <section class="section-container">
        <!-- Page content-->
        @yield('content')
    </section>
    <!-- Page footer-->
    <footer class="footer-container">
        <div class="d-flex justify-content-between align-items-center">
            <span>{{ date('Y') }} &copy; E-Commerce <span class="d-none d-sm-inline">website made with</span> &nbsp;<i class="fas fa-heart"></i>.</span>
            <span class="float-right">V1.0.1</span>
        </div>
    </footer>
</div>

<!-- =============== VENDOR SCRIPTS ===============-->
<!-- JQUERY-->
<script src="{{ asset('js/jquery.js') }}"></script>
<!-- Global Var-->
<script async>
    var DIR        = "{{ $dir }}",
        LANG       = "{{ $lang }}",
        CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'),
        OPERATION_MESSAGE_SUCCESS = "Operation Done Successfuly",
        OPERATION_MESSAGE_FAIL = "Operation Fail";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN,
        }
    });
</script>
<script src="{{ mix('js/control.js') }}" async></script>
<!-- =============== PAGE VENDOR SCRIPTS ===============-->
@yield('js')

</body>
</html>
