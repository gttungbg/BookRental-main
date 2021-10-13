@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>

@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header',['name' => ' publishers ','key'=>' home'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('publishers.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($publishers as $value)
                            <tr>
                                <th scope="row">{{$value->id}}</th>
                                <td>{{$value->name}}</td>
                                <td>{{$value->description}}</td>
                                <td>
                                    <a href="{{route('publishers.edit',['id'=> $value->id])}}" class="btn btn-success">Edit</a>
                                    <a href="{{route('publishers.delete',['id'=> $value->id])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $publishers->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

