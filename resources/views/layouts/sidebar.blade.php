<!-- ========== Left Sidebar Start ========== -->
<style type="text/css">
    .icon{
        position: absolute;
        right: 10px;
            }
    .change .icon {
            -webkit-transform: rotate(-145deg) translate(-9px, 6px);
            transform: rotate(-180deg) translate(0px, 0px);
        }

</style>
<script>
        function myFunct(x) {
            x.classList.toggle("change");
        }
    </script>
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
               
            </div>
            <div class="mt-3">
               
            </div>
        </div>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu" >
                <li class="menu-title">Menu</li>
                <li onclick="myFunct(this)">
                    <a href="javascript: void(0);" >
                        <i class="fa fa-user"></i>
                        <span>Quản lý người dùng</span> <span class="icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('index.user')}}">Thông tin người dùng</a></li>
                    </ul>
                </li>
                
                <li onclick="myFunct(this)">
                    <a href="javascript: void(0);" >
                       <i class="fa fa-list-alt"></i>
                        <span>Quản lý bình luận</span>   <span class="icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        
                        <li><a href="{{route('pendding.index.comment')}}">Danh sách bình luận</a></li>
                        
                    </ul>
                </li>
                <li onclick="myFunct(this)">
                    <a href="javascript: void(0);" >
                       <i class="fa fa-list-alt"></i>
                        <span>Thông tin mượn sách</span>   <span class="icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        
                        <li><a href="">Danh sách</a></li>
                        
                    </ul>
                </li>
               

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

