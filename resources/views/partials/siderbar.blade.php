<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('adminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('categories.index')}}" class="nav-link">
                        <i class="fas fa-luggage-cart"></i>
                        <p>
                            Danh mục Sách
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('publishers.index')}}" class="nav-link">
                        <i class="fas fa-home"></i>
                        <p>
                            Nhà Xuất Bản
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('authors.index')}}" class="nav-link">
                        <i class="fas fa-user-shield"></i>
                        <p>
                           Tác Giả
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('books.index')}}" class="nav-link">
                        <i class="fas fa-address-book"></i>

                        <p>
                            Quản Lý Sách
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('index.user')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            Quản Lý Người Dùng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('pendding.index.comment')}}" class="nav-link">
                        <i class="fas fa-comments"></i>
                        <p>
                            Dach Sách Bình Luận
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="fas fa-torah"></i>
                        <p>
                           User manager
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
