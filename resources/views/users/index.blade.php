@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>

@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('../admins/books/index/list.css')}}">

@endsection


@section('content')
    <div class="content-wrapper">

        @include('partials.content-header',['name' => ' User phuc test ','key'=>' home'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('user.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Ten</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $value)
                                <tr>
                                    <th scope="row">{{$value->id}}</th>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>
                                        <a href="{{route('user.edit',['id'=>$value->id])}}" class="btn btn-success">Edit</a>
                                        <a href="" data-url="{{route('user.delete',['id'=>$value->id])}}"
                                           class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('admins/books/index/list.js')}}"></script>
@endsection

