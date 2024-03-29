<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('admin/custom_admin/custom.css') }}">

    @yield('link_css')


</head>

<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row nav__custom">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
                    alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch navbar-menu__custom">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <div class="search-field d-none d-md-block">
                <form class="d-flex align-items-center h-100" action="#">
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" class="form-control bg-transparent border-0"
                            placeholder="Search projects">
                    </div>
                </form>
            </div>

            {{-- Navbar --}}
            <ul class="navbar-nav navbar-nav-right">
                {{-- Logout --}}
                <li class="nav-item dropdown no-arrow mx-1">
                    <div class="admin_name">
                        <span style="text-transform: capitalize">{{ Auth::user()->username }}
                            {{ Auth::user()->email }}</span>
                        <i class="fa-solid fa-caret-down"></i>
                    </div>

                    <div class="admin_name-dropdown d-none">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            đăng xuất
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                {{-- End Logout --}}
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
        @include('admin.layout.sidebar')

        <div class="main-panel main-panel__custom">
            @yield('contents')

            {{-- @include('admin.layout.footer') --}}
        </div>
    </div>

    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->




    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- plugins:js -->
    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
    <!-- End custom js for this page -->

    <script src="https://kit.fontawesome.com/03e43a0756.js" crossorigin="anonymous"></script>

    <script src="{{ asset('admin/custom_admin/custom.js') }}"></script>

    @yield('js')

    <script>
        const logOut = document.querySelector('.no-arrow');
        const adminName = document.querySelector('.admin_name-dropdown');

        // console.log([adminName]);

        logOut.onclick = () => {
            adminName.classList.remove('d-none')
        }
    </script>
</body>

</html>
