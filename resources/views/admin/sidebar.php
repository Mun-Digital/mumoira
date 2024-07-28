<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php require_once(__DIR__.'/nav.php');?>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="<?=base_url('admin/');?>" class="brand-link">
               <center> <img width="100%" src="<?=base_url('assets/img/logo_dark.png');?>" alt="Admin"></center>
            </a>
            <div class="sidebar">
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="<?=BASE_URL('admin/home');?>"
                                class="nav-link <?=active_sidebar(['home', '']);?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?=menuopen_sidebar(['logs', 'dong-tien']);?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-history"></i>
                                <p>
                                    Lịch Sử
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?=BASE_URL('admin/logs');?>"
                                        class="nav-link <?=active_sidebar(['logs']);?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nhật ký hoạt động</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=BASE_URL('admin/dong-tien');?>"
                                        class="nav-link <?=active_sidebar(['dong-tien']);?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Biến động số dư</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?=menuopen_sidebar(['banner', 'banner-list', 'banner-add']);?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-newspaper"></i>   
                                <p>
                                    Banner
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?=BASE_URL('admin/banner');?>"
                                        class="nav-link <?=active_sidebar(['banner']);?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách banner</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=BASE_URL('admin/banner-list');?>"
                                        class="nav-link <?=active_sidebar(['banner-list']);?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách vị trí</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=BASE_URL('admin/banner-add');?>"
                                        class="nav-link <?=active_sidebar(['banner-add']);?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm vị trí</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('admin/blog-list');?>"
                                class="nav-link <?=active_sidebar(['blog-list', 'blog-add']);?>">
                                <i class="nav-icon fab fa-blogger-b"></i>
                                <p>
                                    Bài Viết
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?=menuopen_sidebar(['version', 'reset', 'category', 'point']);?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-wrench"></i>   
                                <p>
                                    Cài đặt kĩ thuật
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?=BASE_URL('admin/version');?>"
                                        class="nav-link <?=active_sidebar(['version']);?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Phiên bản</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=BASE_URL('admin/reset');?>"
                                        class="nav-link <?=active_sidebar(['reset']);?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kiểu reset</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=BASE_URL('admin/category');?>"
                                        class="nav-link <?=active_sidebar(['category']);?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thể loại</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=BASE_URL('admin/point');?>"
                                        class="nav-link <?=active_sidebar(['point']);?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kiểu point</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('admin/users');?>"
                                class="nav-link <?=active_sidebar(['users', 'user-edit']);?>">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>
                                    Thành Viên
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('admin/bank-list');?>"
                                class="nav-link <?=active_sidebar(['bank-list', 'bank-edit']);?>">
                                <i class="nav-icon fas fa-university"></i>
                                <p>
                                    Ngân Hàng
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('admin/settings');?>"
                                class="nav-link <?=active_sidebar(['settings']);?>">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Cài Đặt
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        