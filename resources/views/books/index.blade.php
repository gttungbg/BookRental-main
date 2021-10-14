@extends('layouts.admin')

@section('title')
    <title>Add books</title>

@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('admins/books/index/list.css')}}">

@endsection

@section('js')
   
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('admins/books/index/list.js')}}"></script>
@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Books','key'=>' List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('books.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Isbn</th>
                                <th scope="col">Title</th>
                                <th scope="col">publisher_id</th>
                                <th scope="col">slug</th>
                                <th scope="col">Size</th>
                                <th scope="col">Num_of_page</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Publish_date</th>
                                <th scope="col">Price</th>
                                <th scope="col">View_count</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $bookList)

                                <tr>
                                    <th scope="row">{{$bookList->isbn}}</th>
                                    <td>{{$bookList->title}}</td>
                                    <td>{{$bookList->publisher_id}}</td>
                                    <td>{{$bookList->slug}}</td>
                                    <td>{{$bookList->size}}</td>
                                    <td>{{$bookList->num_of_page}}</td>
                                    <td>{{$bookList->quantity}}</td>
                                    <td>{{$bookList->publish_date}}</td>
                                    <td>{{number_format($bookList->price)}}</td>
                                    <td>{{$bookList->view_count}}</td>
                                    
                                    <td>
                                       <img class="books_image" src="{{$bookList->feature_image_path}}" alt="" width="100" height="100"> 
                                    </td>

                                    <td>
                                        <a href="{{route('books.edit',['id'=>$bookList->id])}}"
                                           class="btn btn-default">Edit</a>
                                        <a href="" data-url="{{route('books.delete',['id'=>$bookList->id])}}"
                                           class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                     {{ $books->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
