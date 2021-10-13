@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>

@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header',['name' => ' Authors ','key'=>' home'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('authors.create')}}" class="btn btn-success float-right m-2">Add</a>
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
                           @foreach($authors as $value)
                                <tr>
                                    <th scope="row">{{$value->id}}</th>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->date_of_birth}}</td>
                                    <td>
                                        <a href="{{route('authors.edit',['id'=> $value->id ])}}" class="btn btn-success">Edit</a>
                                        <a href="{{route('authors.delete',['id'=> $value->id ])}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $authors->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

