@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection
@section('content')
    <div class="content-wrapper">
    @include('partials.content-header',['name' => 'Users','key'=>'Add'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    <form class="outer-repeater needs-validation" action="{{route('add.user')}}" method="POST" enctype="multipart/form-data" novalidate >
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Vui lòng nhập..." value="{{ old('name') }}" />
                                <span class="error-message">{{ $errors->first('name') }}</span>
                            </div>
                             <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" placeholder="Vui lòng nhập..." value="" />
                                <span class="error-message">{{ $errors->first('address') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" name="Phone" placeholder="Vui lòng nhập..." value="" />
            
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{old('email')}}" placeholder="Vui lòng nhập..." required/>
                                <span class="error-message">{{ $errors->first('email') }}</span>
                                <div class="invalid-feedback">Nhập Email</div>
                            </div>
                            <div class="form-group">
                                <label>Password </label>
                                <input class="form-control" name="password" value="" type="password" placeholder="Vui lòng nhập..."required />
                                <span class="error-message">{{ $errors->first('password') }}</span>
                                <div class="invalid-feedback">Nhập Password</div>
                            </div>
                            <button type="submit" class="btn btn-success">Thêm người dùng</button>
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

