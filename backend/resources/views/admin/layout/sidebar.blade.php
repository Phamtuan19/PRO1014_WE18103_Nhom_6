<!-- partial -->

<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas sidebar__custom" id="sidebar">
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link"href="{{ route('admin.orders') }}">
                <span class="menu-title">Đơn hàng</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Bài viết</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>

            <div class="collapse_sub d-none " id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.posts.create') }}"> Thêm bài viết </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.posts.index') }}"> Danh sách bài viết </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Sản phẩm</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>

            <div class="collapse_sub d-none " id="general-pages">
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
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Danh mục bán hàng</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>

            <div class="collapse_sub d-none  " id="general-pages">
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
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#" aria-expanded="false"
                aria-controls="general-pages">
                <span class="menu-title">Nhà xuất bản</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>

            <div class="collapse_sub d-none  " id="general-pages" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.publishing-house.create') }}"> Thêm nhà xuất bản </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.publishing-house.index') }}"> Danh sách nhà xuất bản
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Tác giả</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>

            <div class="collapse_sub d-none  " id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.author.create') }}"> Thêm Tác giả </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.author.index') }}"> Danh sách Tác giả </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Danh mục sản phẩm</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
            <div class="collapse_sub d-none  " id="general-pages">
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
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Quản trị viên</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse_sub d-none  " id="general-pages">
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
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Người dùng</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse_sub d-none  " id="general-pages">
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
