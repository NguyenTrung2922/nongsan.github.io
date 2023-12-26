<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/dist/img/AdminLTELogo-1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Trang quản trị</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Hội GDCSSKCD Tây Nguyên</a>
            </div>
        </div> -->

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-header">GIỚI THIỆU VÀ ĐẠI LÝ</li>
                <li class="nav-item">
                    <a href="/admin/introduces/add" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Tạo trang</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/introduces/list" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Danh sách trang</p>
                    </a>
                </li>
                <li class="nav-header">QUẢN LÝ DANH MỤC</li>
                <li class="nav-item">
                    <a href="/admin/categorys/add" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Tạo mới danh mục</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/categorys/list" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Danh sách danh mục</p>
                    </a>
                </li>

                <!-- <li class="nav-header">QUẢN LÝ MENU</li>
                <li class="nav-item">
                    <a href="/admin/menus/add" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Tạo mới menu</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/menus/list" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Danh sách menu</p>
                    </a>
                </li> -->
                <li class="nav-header">QUẢN LÝ SẢN PHẨM</li>
                <li class="nav-item">
                    <a href="/admin/products/add" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Tạo mới sản phẩm</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/products/list" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Danh sách sản phẩm</p>
                    </a>
                </li>

                <li class="nav-header">QUẢN LÝ CHÍNH SÁCH</li>
                <li class="nav-item">
                    <a href="/admin/policys/add" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Tạo mới chính sách</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/policys/list" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Danh sách chính sách</p>
                    </a>
                </li>


                <li class="nav-header">QUẢN LÝ BANNER</li>
                <li class="nav-item">
                    <a href="/admin/banners/add" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Danh sách banner</p>
                    </a>
                </li>

                <li class="nav-header">QUẢN LÝ TIN TỨC</li>
                <li class="nav-item">
                    <a href="/admin/news/add" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Tạo mới tin tức</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/news/list" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Danh sách tin tức</p>
                    </a>
                </li>

                <li class="nav-header">QUẢN LÝ ĐƠN HÀNG</li>
                <li class="nav-item">
                    <a href="/admin/cart" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Danh sách đơn hàng</p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="/admin/news/list" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Danh sách tin tức</p>
                    </a>
                </li> -->

                <li class="nav-header">QUẢN LÝ PHẢN HỒI</li>
                <li class="nav-item">
                    <a href="/admin/messages/list" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Danh sách phản hồi</p>
                    </a>
                </li>

                <li class="nav-header">TÀI KHOẢN</li>
                <li class="nav-item">
                    <a href="/admin/user/list" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Danh sách tài khoản</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/user/show" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Thông tin cá nhân</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>