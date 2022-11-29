<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>
    <body>
        <div class='container'><br><br>
                <button type='submit' class='btn btn-primary' onclick="window.location ='{{route('add_user') }}'" style='margin-left:523px'>
                Add New</button>
                <h4>Users Record</h4>
            <table class="table caption-top"  style='width:40%'>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Experience</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $details_result)
                    <tr>
                        <th scope="row">{{$details_result->id}}</th>
                        <td><img src="{{asset('images/'.$details_result->file)}}" width='100%'/></td>
                        <td>{{$details_result->name}}</td>
                        <td>{{$details_result->email}}</td>
                        <td>{{$details_result->experience}}</td>
                        <td><a style='cursor:pointer' href="{{route('delete_entry',$details_result->id)}}">xRemove</a></td>
                        
                        <td><a style='cursor:pointer' href="{{route('edit_user_entry',$details_result->id)}}">Edit</a></td>

                    </tr> 
                    @endforeach      
                </tbody>
            </table>
        </div>
    </body>
</html>
<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('message') }}");
    @endif
    @if(Session::has('delete_message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.error("{{ session('delete_message') }}");
    @endif
    @if(Session::has('update_message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.info("{{ session('update_message') }}");
    @endif
    function getMessage() {
        var id = $(this).data("id");
            $.ajax({
               type:'get',
               url:"delete_entry/"+id,
               data:"s",
               success:function(data){
                  console.log("yes");
               }
            });
         }
</script>