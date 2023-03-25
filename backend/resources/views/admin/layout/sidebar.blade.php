<!-- partial -->

<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas sidebar__custom" id="sidebar">
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Đơn hàng</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse show" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Danh sách đơn hàng</a></li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a> --}}
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="menu-title">Products</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>

            <div class="collapse show" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products.create') }}"> Thêm sản phẩm </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products.index') }}"> Danh sách sản phẩm </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="menu-title">Danh mục bán hàng</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>

            <div class="collapse show" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.storecatalog.create') }}"> Thêm thư mục </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.storecatalog.index') }}"> Danh sách </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="menu-title">Publishing House</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>

            <div class="collapse show" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.publishing-house.create') }}"> Thêm danh mục </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.publishing-house.index') }}"> Danh sách danh mục </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="menu-title">Author</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>

            <div class="collapse show" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.author.create') }}"> Thêm danh mục </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.author.index') }}"> Danh sách danh mục </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="menu-title">Catrgories</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
            <div class="collapse show" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.categories.create') }}"> Thêm danh mục </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.categories.index') }}"> Danh sách danh mục </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Quản trị viên</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
            </a>
            <div class="collapse show" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.create') }}"> Thêm quản trị viên </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}"> Danh sách quản trị viên </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#" aria-expanded="false" aria-controls="customers">
                <span class="menu-title">Người dùng</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse show" id="customers">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.customers.create') }}"> Thêm tài khoản mới </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.customers.index') }}"> Danh sách người dùng </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
