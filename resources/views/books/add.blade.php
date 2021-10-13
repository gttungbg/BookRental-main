@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/books/add/add.css')}}" rel="stylesheet" />

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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">isbn</label>
                            <input type="text" class="form-control" id=""
                                   placeholder="isbn" name="isbn"><br>
                        </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="tên danh mục" name="title"><br>
                            </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" id=""
                                   placeholder="tên danh mục" name="slug"><br>
                        </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Size</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="size">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">num_of_page</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="numOfPage">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">quantity</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="quantity">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">publish_date</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="publish_date" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">price</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">view_count</label>
                                <input type="text" class="form-control" id=""
                                       placeholder="mô tả" name="view_count">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Images avata</label>
                                <input type="file" class="form-control-file" id=""
                                       placeholder="mô tả" name="feature_image_path">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Images details</label>
                                <input type="file" multiple class="form-control-file" id=""
                                       placeholder="mô tả" name="image_path[]">
                            </div>
                            <div class="form-group">
                                <label>Chọn danh mục </label>
                                <select class="form-control select2_init" name="category_id" >
                                    <option value="">Chọn danh mục </option>
                                    {!!$htmlOption!!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên tác giả</label>
                            <select  name="authors[]" class="form-control tags_select_choose" multiple="multiple">

                            </select>
                            </div>


                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control tinymce_editor_init" rows="8"
                                      name="contents" required="required">
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
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{asset('admins/books/add/add.js')}}"></script>

@endsection
