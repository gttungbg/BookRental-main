@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection
@section('content')
    <div class="content-wrapper">
    @include('partials.content-header',['name' => 'Users ','key'=>'Edit'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    <form action="{{route('update.user',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Vui lòng nhập..." value=" {{old('name')}}" />
                                <span class="error-message">{{ $errors->first('name') }}</span>
                            </div>
                             <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" placeholder="Vui lòng nhập..." value="" />
                                <span class="error-message">{{ $errors->first('address') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" name="phone" placeholder="Vui lòng nhập..." value=" {{old('phone_numer')}} " />
                                <span class="error-message">{{ $errors->first('phone_numer') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Vui lòng nhập..." readonly value=" {{old('email')}} " />
                                <span class="error-message">{{ $errors->first('email') }}</span>
                            </div>
                             <div class="form-group">
                                {{-- <input type="checkbox" name="check" id="check" /> --}}
                                <label>Đổi mật khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu"
                                 value="{{$user->password}}"/>
                                <span class="error-message" >{{ $errors->first('password') }}</span>
                            </div>
                             <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control password" name="passwordAgain" placeholder="Nhập lại mật khẩu"  value=" {{$user->password}} "/>
                                <span class="error-message">{{ $errors->first('passwordAgain') }}</span>
                            </div>
                            <button type="submit" class="btn btn-success">Sửa thông tin</button>
                            <button type="reset" class="btn btn-info">Reset</button>
                        <form>
                    </div>


                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('script')
        <!-- plugin js -->
        <script src="{{ URL::asset('libs/apexcharts/apexcharts.min.js')}}"></script>
        
        <!-- jquery.vectormap map -->
        <script src="{{ URL::asset('libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>
        
        <!-- Calendar init -->
        <script src="{{ URL::asset('js/pages/dashboard.init.js')}}"></script>
        <script type="text/javascript">
    $(document).ready(function(){
       $("#check").change(function(){
           if($(this).is(":checked"))
           {
            $(".password").removeAttr('disabled');
           }
           else
           {
            $(".password").attr('disabled','');
           }
       });

    });

</script>
@endsection