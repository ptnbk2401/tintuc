@extends('templates.core.master')
@section('css')
    <style>
        .post-thumb:hover{
          -webkit-filter: none;
        }

        .custom-file-upload:hover {
            color: #044962;
        }
        .form-control[readonly] {
            background-color: #dfe7e8;
        }
    </style>
@stop
@section('pagename','Profile Information')
@section('title','Profile Information')
@section('main')
  <div class="row">
    @php
        $avatar_url = '';
        $avatar = $objUser->avatar;
         if($avatar != '') {
            if (file_exists(storage_path("app/media/files/users/{$avatar}"))) {
                $avatar_url = \App\Classes\Utils\FileUtils::resizeResultPathFile($avatar , 'users', 124, 124);
            }else {
                $avatar_url = \App\Classes\Utils\FileUtils::resizeResultPathFile('avatar.png' , 'display', 124, 124);
            }
        } else {
        if (file_exists(storage_path("app/media/files/display/avatar.png")))
            {
                $avatar_url = \App\Classes\Utils\FileUtils::resizeResultPathFile('avatar.png' , 'display', 124, 124);
            }
        }
        $first_name = $objUser->first_name ; 
        $last_name = $objUser->last_name ; 
        $display_name = $objUser->display_name ; 
        $address = $objUser->address ; 
        $email = $objUser->email ; 
        $phone = $objUser->phone ; 
    @endphp
        
    <div class="sec-topic col-sm-16 col-md-8 wow fadeInDown animated " data-wow-delay="0.5s"> 
        <div  id="avatar-img" class="col-sm-6"  >
            <img src="{{ $avatar_url }}" class="img-thumbnail">
        </div>
        @if (session('msgSuccess'))
        <div class="col-sm-6 col-sm-offset-1 alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('msgSuccess') }}
        </div>
        @endif
        @if (session('msgError'))
        <div class="col-sm-6 col-sm-offset-1 alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('msgError') }}
        </div>
        @endif
        <div class="clearfix">
        </div>
        <form action="" id="imageUploadForm" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <label class="col-sm-6 btn btn-success" style="margin-top: 5px;">
            <input type="file" name="avatar" id="avatar" class="" style="display: none" onchange="uploadAvatar()" >
            <span class="fa fa-camera"></span> Change photo
        </label>
        </form>

    </div>

    <div class="col-sm-16">
    <form action="{{ route('vpublic.profile.edit') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" tabindex="1" value="{{ $first_name }}" readonly required>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control" tabindex="2" value="{{ $last_name }}" readonly required>
              </div>
            </div>
        </div>
        <div class="form-group">
            <label for="display_name">Display Name</label>
            <input type="text" name="display_name"  class="form-control"  tabindex="3" value="{{ $display_name }}" readonly required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email"  class="form-control"tabindex="3" value="{{ $email }}" readonly required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone"  class="form-control" tabindex="3" value="{{ $phone }}" readonly >
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" tabindex="3" value="{{ $address }}" readonly >
        </div>
        <div class="form-group">
            <input type="button" id="btn-button" class="btn btn-info" tabindex="3" value="Edit Profile" onclick="editProfile()" >
            <input type="submit" id="btn-submit" class="btn btn-success" tabindex="3" value="Save Profile" style="display: none" >
        </div>
    </form>
    </div>
  </div>
@stop
@section('js')
<script>
    function editProfile() {
         $('input').attr('readonly',false);
         $('#btn-button').hide();
         $('#btn-submit').show();
         $('input[name=first_name]').focus();
    }
    function uploadAvatar() {
        $("#imageUploadForm").submit();
    }
    $('#imageUploadForm').on('submit',(function(e) {
        e.preventDefault();
        var file_data = $('#avatar').prop('files')[0];
        var type = file_data.type;
        //Xét kiểu file được upload
        var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];
        //kiểm tra kiểu file
        if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {
            var formData = new FormData(this);
            formData.append('file', $('#avatar').prop('files')[0]);
            $.ajax({
                type:'POST',
                url: "{{ route('vadmin.core.profile.upload') }}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data != 0){
                        $('#avatar-img').html(data);
                    }
                },
                error: function(data){
                    console.log("error");
                    console.log(data);
                }
            });
        } else {
            alert('Please select the correct image file format (.gif, .png, .jpg)');
        }
    }));

    
</script>
@stop

