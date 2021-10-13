@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>

@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header',['name' => ' Comment ','key'=>' home'])

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
                                <th scope="col">Tên sách</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Đánh giá</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                    $stt = 1;
                ?>
               @foreach($comments as $comment)
               <tr>
                <td>{{ $stt++ }}</td>
                <td>{{ $comment->book_id}}</td>
                <td>{{ $comment->comment}}</td>
                <td>{{ $comment->member_rate}}</td>
                <td>
                    <a href="{{route('success.comment',$comment->id)}}"><i class="fas fa-check-circle" style="color: green"></i></a>
                    <a href="{{route('delete.comment',$comment->id)}}"><i class="fa fa-trash tacvu" style="color: red"></i></a>
                </td>
                </tr>
                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

