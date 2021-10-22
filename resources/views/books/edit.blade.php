@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('css')
    <link href="{{asset('../vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('../admins/books/add/add.css')}}" rel="stylesheet" />

@endsection



@section('content')
    <div class="content-wrapper">
    @include('partials.content-header',['name' => 'Books ','key'=>'Edit'])

    <!-- Main content -->
        <form action="{{route('books.update',['id'=>$books->id])}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1">isbn</label>
                            <input type="text" class="form-control" id=""
                                   placeholder="isbn" name="isbn"  value="{{$books->isbn}}"><br>
                        </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="tên danh mục" name="title" value="{{$books->title}}"><br>
                            </div>

                            <div class="form-group col-md-3 ">
                                <label>Chọn Nha San Xuat </label>
                                <select class="form-control" name="publisher_id" >
                                    <option>Chọn danh mục </option>
                                    @foreach($data as $value)
                                    <option value="{{$value->id}}">{{$value->name}} </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1" >Slug</label>
                                <input type="text" class="form-control" id=""
                                    placeholder="tên danh mục" name="slug" value="{{$books->slug}}"><br>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Size</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="size" value="{{$books->size}}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">num_of_page</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="numOfPage" value="{{$books->num_of_page}}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">quantity</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="quantity"  value="{{$books->quantity}}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">publish_date</label>
                                <input type="date" class="form-control" id=""
                                       placeholder="mô tả" name="publish_date"  value="{{$books->publish_date}}" >
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">price</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="price" value="{{$books->price}}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">view_count</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="view_count"  value="{{$books->view_count}}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Images avata</label>
                                <input type="file" class="form-control-file" id=""
                                       placeholder="mô tả" name="feature_image_path">
                                       <div class="col-md-12">
                                           <div class="row">
                                               <img class="image_avt" src="{{$books->feature_image_path}}" alt="">
                                           </div>
                                       </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Images details</label>
                                <input type="file" multiple class="form-control-file" id=""
                                       placeholder="mô tả" name="image_path[]">
                                       <div class="col-md-12">
                                           <div class="row">
                                               @foreach($books->booksImage as $booksImageItem)
                                                   <div class="col-md-3">
                                                        <img  class="image_detail" src="{{$booksImageItem->image_path}}" alt="">
                                                   </div>

                                               @endforeach
                                           </div>
                                       </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Chọn danh mục </label>
                                <select class="form-control select2_init" name="category_id" >
                                    <option value="">Chọn danh mục </option>
                                    {!!$htmlOption!!}
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Tên tác giả</label>
                            <select  name="authorsIds[]" class="form-control tags_select_choose" multiple="multiple">
                                @foreach($books->authors as $ItemAuthors)

                                <option value="{{$ItemAuthors->id}}" selected>
                                      {{$ItemAuthors->name}}
                                </option>

                                @endforeach
                            </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Date_of_birth</label>
                                <input type="date" class="form-control" id=""
                                       placeholder="date_of_birth" name="date_of_birth" value="{{$books->date_of_birth}}">
                            </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control tinymce_editor_init" rows="15"
                                      name="contents" required="required" value="{{$books->description}}">
                                </textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>


                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        </form>
        <!-- /.content -->
    </div>

@endsection
@section('js')
    <script src="{{asset('../vendors/select2/select2.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/4xufq4bymqa86p2h9xcs1jqwqprd5516kh2luaoudog6cto8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{asset('../admins/books/add/add.js')}}"></script>

@endsection
