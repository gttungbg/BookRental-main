@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>

@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Publishers ','key'=>' edit']);

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('publishers.update',['id'=>$data->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control"  placeholder="Nhap name"
                                       value="{{$data->name}}" name="name">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control"  value="{{$data->description}}" rows="3"
                                          name="description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

