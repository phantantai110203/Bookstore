<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="/asset/img/user.jpg" type="image/x-icon">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="description" content="Mô tả nội dung trang">
    <meta name="keywords" content="Từ khóa, từ khóa, từ khóa">
    <meta name="robots" content="index,follow">
    <link rel="canonical" href="https://www.example.com/">

    <!-- Favicon -->
    <link href="/backend-admin/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet"> --}}

    <!-- Icon Font Stylesheet -->

    <link rel="stylesheet" href="/backend-admin/css/adminlte.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/backend-admin/css/bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link href="/backend-admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/backend-admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/./backend-admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/./backend-admin/css/style.css" rel="stylesheet">


    <script src="/backend-admin/js/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3" style="width: 20%; margin-left:0px;" >
            <nav class="navbar bg-secondary navbar-dark">
                <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
                    <h3><i class="fa fa-user-edit me-2"></i>BookStore</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="/asset/img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('dashboard') }}" class="nav-link" style="color: white"><i
                            class="fa fa-tachometer-alt me-2"></i>Trang
                        chủ</a>
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div> --}}
                    <a href="{{ route('users.index') }}" class="nav-link" style="color: white"><i
                            class="fa fa-user me-2"></i>Quản
                        lý tài
                        khoản</a>
                    <a href="{{ route('books.index') }}" class="nav-link" style="color: white"><i
                            class="fa fa-book me-2"></i>Quản
                        lý sản phẩm</a>
                    <a href="{{ route('invoices.index') }}" class="nav-link" style="color: white"><i
                            class="fa fa-table me-2"></i>Quản lý hóa đơn</a>
                    <a href="{{ route('category.index') }}" class="nav-link" style="color: white"><i
                            class="fas fa-pen-nib me-2"></i>Quản
                        lý thể loại</a>
                    {{-- <a href="#" class=" nav-link" style="color: white"><i class="fas fa-comment-alt"></i>Quản lý
                        bình luận</a> --}}
                    {{-- <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Thống kê</a> --}}
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item active">Blank Page</a>
                        </div>
                    </div> --}}
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar  bg-secondary  sticky-top px-4 py-0" style="background-color: white">

                <div class="navbar-nav align-items-center ms-auto">



                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">

                            <span style="color: white" class="d-none d-lg-inline-flex"><p>Xin chào :</p> {{ Auth::user()->name }} </span>
                            <img class="rounded-circle me-lg-2" src="/asset/img/user.jpg" alt=""
                                style="width: 40px; height: 40px;">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <form class="dropdown-item" method="post" action="{{ route('logout') }}">
                                @csrf
                                <input type="submit" value="Log out">
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Blank Start -->

            <div  style="background-color:#f4f6f9; margin-left:20px; margin-top:10px">
                @yield('content')
            </div>
            <!-- Blank End -->


            <!-- Footer Start -->

            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-info bscripttn-primary btn-lg-square back-to-top"><i
                class="fas fa-hand-point-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="/backend-admin/js/jquery-3.4.1.min.js"></script>

    <script src="/backend-admin/lib/chart/chart.min.js"></script>
    <script src="/backend-admin/lib/easing/easing.min.js"></script>
    <script src="/backend-admin/lib/waypoints/waypoints.min.js"></script>
    <script src="/backend-admin/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/backend-admin/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/backend-admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/backend-admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="/backend-admin/js/main.js"></script>

    @stack('JS_REGION')
</body>

</html>
