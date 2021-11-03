@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>

@endsection

@section('css')
    <link href="{{asset('../vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('../admins/books/add/add.css')}}" rel="stylesheet" />

@endsection

@section('content')
    <div class="content-wrapper">
    @include('partials.content-header',['name' => 'Users','key'=>'Edit User'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('user.update',['id'=>$user->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Ten user</label>
                                <input type="text" class="form-control"
                                       placeholder="Nhap name" name="name"  value="{{$user->name}}">

                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="text" class="form-control"
                                       placeholder="Nhap name" name="email" value="{{$user->email}}"">

                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">PassWord</label>
                                <input type="password" class="form-control"
                                       placeholder="Nhap name" name="password" value="{{$user->password}}"">

                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Chon vai tro</label>
                                <select name="role_id[]" id="" class="form-control select2_init" multiple>
                                    <option value=""></option>
                                    @foreach($roles as $role)
                                        <option {{$roleOfUser->contains('id',$role->id) ? 'selected' : ''}}
                                            value="{{$role->id}}">{{$role->name}}
                                        </option>
                                    @endforeach

                                </select>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('../vendors/select2/select2.min.js')}}"></script>
    <script>
        $('.select2_init').select2({
            'placeholder' : 'chon vai tro'
        })
    </script>
    <script src="{{asset('../admins/books/add/add.js')}}"></script>

@endsection
