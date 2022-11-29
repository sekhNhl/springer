<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>
<form action="{{route('update_user_info',$edit_vl->id)}}" method='post' enctype="multipart/form-data">
    @csrf
    <div class='container'>
        <div class='row'>
            <div class='form-group col-lg-3'>
                <label>Image</label>
                <input type='file'  name='file'class='form-control' value="{{asset('update_images/'.$edit_vl->file)}}"/><br>
                <img src="{{asset('images/'.$edit_vl->file)}}" width='50%'/>
                
            </div>
            <div class='form-group col-lg-3'>
                <label>Name</label>
                <input type='text'  name='name'class='form-control' value="{{$edit_vl->name}}" placeholder='name'/>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            </div>
            <div class='row'>
            <div class='form-group col-lg-3'>
                <label>Email</label>
                <input type='email' value="{{$edit_vl->email}}" name='email'class='form-control' placeholder='email'/>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class='form-group col-lg-3'>
                <label>Experince</label>
                <input type='text'  value="{{$edit_vl->experience}}" name='experience'class='form-control' placeholder='Experience'/>
                @error('experience')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <button type='submit' class='btn btn-primary'>Update</button>
        <button type='button' class='btn btn-warning' onclick="window.location='{{ route('back')}}'">Back</button>

    </div>
</form>
</body>
</html>