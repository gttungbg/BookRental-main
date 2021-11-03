@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>

@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header',['name' => ' Users ','key'=>' home'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('create.user')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                {{-- <th scope="col">Password</th> --}}
                                <th scope="col">Tác vụ</th>
            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt =1 ?>
                @foreach($users as $user)
                            <tr>
                                <th scope="col">{{$stt++}}</th>
                                <th scope="col">{{substr($user->name,0,70)}}</th>
                                <th scope="col">{{substr($user->address,0,70)}}</th>
                                <th scope="col">{{substr($user->phone_numer,0,70)}}</th>
                                <th scope="col">{{$user->email}}</th>
                                {{-- <th scope="col">{{$user->password}}</th> --}}
                                <th scope="col"><a href="{{route('edit.user',['id'=>$user->id])}}"><i class="btn btn-success">Edit</i></a><a href="{{route('delete.user',['id'=>$user->id])}}" onclick="return confirm('bạn có chắc muốn xóa không ?')"><i class="btn btn-danger">Delete</i></a></th>
                            </tr>
            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                    <div class="row">{{ $users->appends(Request::all())->links() }}</div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
@section('script')
     <script type="text/javascript">
            $('#search').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ route('search.user') }}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endsection

