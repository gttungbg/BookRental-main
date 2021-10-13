
<header id="page-topbar">
    <style>
        .logo-top{
            display: inline-table;
            margin-top: 67px;
        }
        .float-right{
            margin-top: 67px;
            background-color: #eff2f7;
        }
        .navbar-header{
            background-color: white !important;
        }
        .name{
            color:#283d92;
        }
        .avatar-md-profile {
            height: 3rem;
            width: 3rem;
        }
    </style>
    <div class="navbar-header">
        <div class="container-fluid">
            {{-- <div class="row"> --}}
               
                <div class="float-right">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-none d-xl-inline-block ml-1 name">{{Auth::user()->name}}</span>
                           <i class="fa fa-angle-down name"></i>
                        </button>
                      
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a class="dropdown-item" href=""><i class="fa fa-user font-size-16 align-middle mr-1"></i> Thông tin cá nhân</a>
                            <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="fa fa-wrench font-size-16 align-middle mr-1"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-lock-open font-size-16 align-middle mr-1"></i> Lock screen</a>
                            <div class="dropdown-divider"></div> --}}
                            <a class="dropdown-item text-danger" href=""><i class="fa fa-power-off font-size-16 align-middle mr-1 text-danger"></i> Đăng xuất</a>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="fa fa-settings-outline name"></i>
                        </button>
                    </div>

                </div>
            </div>
    </div>
</div>
</header>