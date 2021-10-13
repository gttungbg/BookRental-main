@extends('layouts.master')

@section('title') Danh sách bình luận đã duyệt @endsection

@section('content')
     <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Danh sách bình luận</a></li>
      </ol>
    </nav>
    <div class="row" style="position: relative;">
        <div class="form div-select" style="">
            <input type="text" placeholder="Tìm kiếm...">
        </div>
        <div class="form div-select " style="">
            <select name="" id=""class="select-all">
                <option value="">Tìm theo</option>
               
            </select>
        </div>
        <div class="form div-select " style="">
            <select name="" id=""class="select-all">
                <option value="">Số hiển thị</option>
                
            </select>
        </div>
        <div class="form div-add" style="">
              <a href="{{route('pendding.index.comment')}}" style="margin-bottom: 5px">Danh sách bình luận chờ duyệt</a>  
        </div>
    </div>
    <br>
     <table class="table table-striped table-hover table-primary" style="text-align: center;width: 100% !important;">
            <thead class="{{-- thead-dark --}}" style="background-color:#283d92;color: white">
                <tr>
                    <th><input type="checkbox"  name=""></th>
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
               @foreach($comment as $comment)
               <tr>
                <th><input type="checkbox"  name=""></th>
                <td>{{ $stt++ }}</td>
                <td>{{ $comment->book_id}}</td>
                <td>{{ $comment->title}}</td>
                <td>{{ $comment->member_rate}}</td>-
                <td>
                    <a href="{{route('delete.comment',$comment->id)}}"><i class="fa fa-trash tacvu" style="color: red"></i></a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection


