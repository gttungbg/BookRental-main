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
    @include('partials.content-header',['name' => 'Books ','key'=>'Add'])

    <!-- Main content -->
        <form action="{{route('books.store')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1">isbn</label>
                            <input type="text" class="form-control" id=""
                                   placeholder="isbn" name="isbn"><br>
                            @error('isbn')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="tên danh mục" name="title"><br>
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label>Chọn Nha San Xuat </label>
                                <select class="form-control" name="publisher_id" >
                                    <option>Chọn danh mục </option>
                                    @foreach($data as $value)
                                    <option value="{{$value->id}}">{{$value->name}} </option>
                                    @endforeach

                                </select>
                                @error('publisher_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" class="form-control" id=""
                                    placeholder="tên danh mục" name="slug"><br>
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Size</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="size">
                                @error('size')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">num_of_page</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="numOfPage">
                                @error('numOfPage')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">quantity</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="quantity">
                                @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">publish_date</label>
                                <input type="date" class="form-control" id=""
                                       placeholder="mô tả" name="publish_date" >
                                @error('publish_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">price</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="price">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">view_count</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="view_count">
                                @error('view_count')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Images avata</label>
                                <input type="file" class="form-control-file" id=""
                                       placeholder="mô tả" name="feature_image_path">
                                @error('feature_image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Images details</label>
                                <input type="file" multiple class="form-control-file" id=""
                                       placeholder="mô tả" name="image_path[]">
                                @error('image_path[]')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label>Chọn danh mục </label>
                                <select class="form-control select2_init" name="category_id" >
                                    <option value="">Chọn danh mục </option>
                                    {!!$htmlOption!!}
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label>Tên tác giả</label>
                            <select  name="authorsIds[]" class="form-control tags_select_choose" multiple="multiple"></select>
                                @error('authorsIds[]')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Date_of_birth</label>
                                <input type="date" class="form-control" id=""
                                       placeholder="date_of_birth" name="date_of_birth">
                                @error('date_of_birth')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control tinymce_editor_init" rows="15"
                                      name="contents">
                                </textarea>
                            @error('contents')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
