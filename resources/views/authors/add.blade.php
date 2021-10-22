@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection
@section('content')
    <div class="content-wrapper">
    @include('partials.content-header',['name' => 'authors ','key'=>'Add'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('authors.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Authors Name</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="tên tác giả" name="name" value="{{old('name')}}"><br>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date_of_birth</label>
                                <input type="date" class="form-control" id=""
                                       placeholder="Date_of_birth" name="date_of_birth" value="{{ old('date_of_birth')}}"><br>
                                @error('date_of_birth')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

