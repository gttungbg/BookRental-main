@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>

@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Publishers','key'=>'Add']);

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('publishers.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control"  placeholder="Nhap name" name="name">

                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                          name="description"></textarea>

                                @error('description')
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

