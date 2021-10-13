@extends('layouts.master')

@section('title') Profile @endsection

@section('content')
    
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ol>
        
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
      </nav>
    
@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        <!-- plugin js -->
        <script src="{{ URL::asset('libs/apexcharts/apexcharts.min.js')}}"></script>
        
        <!-- jquery.vectormap map -->
        <script src="{{ URL::asset('libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>
        
        <!-- Calendar init -->
        <script src="{{ URL::asset('js/pages/dashboard.init.js')}}"></script>
@endsection