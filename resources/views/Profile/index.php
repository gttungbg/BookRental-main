@extends('layouts.master')

@section('title') Profile @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title')<a href="{{route('dashboard')}}">Dashboard</a> @endslot
         @slot('title_li') Welcome to Qovex Dashboard   @endslot
     @endcomponent

     <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home"></i><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Thông tin cá nhân</a></li>
      </ol>
    </nav>
    <div class="card-body">
        <div class="row">
             <div class="form-group col-md-12">
                <div class="row">
                    <div class="col-md-2"><label>Image</label></div>
                    </div>
                    <div class="col-md-4">
                        <button type="button" id="selectoneimage" class="btn btn-primary">
                        Chọn ảnh
                        </button>
                    </div>
                </div>
                <span class="error-message" id="avatarErrr">{{ $errors->first('avatar') }}</span>
            </div>
            <div class="form-group col-md-6"> 
                <label>Name</label>
                <input class="form-control" name="firstname" id="firstname" value="{{$profile->firstname}}" placeholder="Vui lòng nhập..." />
                <span class="error-message"  id="firstnameErr">{{ $errors->first('name') }}</span>
            </div>
            <div class="form-group col-md-6"> 
                <label>Address</label>
                <input class="form-control" name="lastname" id="lastname" value="{{$profile->lastname}}" placeholder="Vui lòng nhập..." />
                <span class="error-message" id="lastnameErr">{{ $errors->first('address') }}</span>
            </div>
             <div class="form-group col-md-6"> 
                <label>Phone</label>
                <input class="form-control" name="lastname" id="lastname" value="{{$profile->lastname}}" placeholder="Vui lòng nhập..." />
                <span class="error-message" id="lastnameErr">{{ $errors->first('phone_numer') }}</span>
            </div>

            <div class="form-group col-md-12"> 
                <label>Username</label>
                <input class="form-control" name="email" id="email" value="{{$profile->email}}" readonly placeholder="Vui lòng nhập..." />
                <span class="error-message" id="emailErr">{{ $errors->first('title') }}</span>
            </div>
           
            <div class="form-group col-md-12"> 
                <label>Password</label>
                <input class="form-control" type="password" id="password" name="password" value="{{$profile->password}}" placeholder="Vui lòng nhập..." />
                <span class="error-message" id="passwordErr">{{ $errors->first('password') }}</span>
            </div>
            <div class="form-group col-md-12"> 
                <label>Repassword</label>
                <input class="form-control" type="password" id="repassword" name="repassword" value="{{$profile->password}}" placeholder="Vui lòng nhập..." />
                <span class="error-message" id="repasswordErr">{{ $errors->first('repassword') }}</span>
            </div>
        </div>
    </div>
     {{-- input hidden --}}
    <input type="hidden" name="hidden_img_profile" id="hidden_img_profile" value="{{$profile->avatar}}">
    <input type="hidden" name="id_hidden" id="id_hidden" value="{{$profile->id}}">

    <div class="card-footer"> <input type="button" name="submit-profile" id="submit-profile" class="btn btn-success" value="Cập nhật thông tin"></div>
    {{-- modal --}}
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" id="btn-oke-profile" class="btn btn-secondary" data-dismiss="modal">Oke</button>
        </div>
    </div></div>
@endsection
@section('script')
    <script>
        //submit-profile
        $('#submit-profile').on('click',function(){
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }

            });
            $.ajax({
                type: "POST",
                url: "{{ route('profile.edit') }}",
                data: {
                    id:$('#id_hidden').val(),
                    name:$('#name').val(),
                    address:$('#address').val(),
                    avatar:$('#hidden_img_profile').val(),
                    email:$('#email').val(),
                    password:$('#password').val(),
                    repassword:$('#repassword').val(),
                },
                success:function (data) {
                    alert('Thông tin cá nhân đã được sửa.');
                },
                error: function (response) {
                    $('#nameErr').text(response.responseJSON.errors.firstname);
                    $('#addressErr').text(response.responseJSON.errors.lastname);
                    $('#avatarErr').text(response.responseJSON.errors.avatar);
                    $('#emailErr').text(response.responseJSON.errors.email);
                    $('#passwordErr').text(response.responseJSON.errors.password);
                    $('#repasswordErr').text(response.responseJSON.errors.repassword);
                }
            })
            return false;
        })
    </script>

@endsection
