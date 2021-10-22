@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection
@section('content')
    <div class="content-wrapper">
    @include('partials.content-header',['name' => 'authors ','key'=>'Edit'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('authors.update',['id'=>$data->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Authors Name</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="tên tác giả" name="name" value="{{$data->name}}"  required=""><br>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date_of_birth</label>
                                <input type="date" class="form-control" id=""
                                       placeholder="Date_of_birth" value="{{$data->date_of_birth}}"  name="date_of_birth" required=""><br>

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

