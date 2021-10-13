@extends('layouts.admin')

@section('title')
    <title>Add books</title>

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
                                <th scope="col">Description</th>
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

                                <tr>
                                    <th scope="row">001</th>
                                    <td>Sach Tieng Anh</td>
                                    <td>Danh cho THPT</td>
                                    <td>10*20cm</td>
                                    <td>260</td>
                                    <td>200</td>
                                    <td>20/02/1999</td>
                                    <td>140</td>
                                    <td>240</td>
                                    <td>?</td>
                                    <td>
                                        <a href=""
                                           class="btn btn-default">Edit</a>
                                        <a href=""
                                           class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
{{--                        {{ $categories->links('pagination::bootstrap-4') }}--}}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

