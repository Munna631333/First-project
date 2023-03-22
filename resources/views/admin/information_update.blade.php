<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
    
</head>
<body>
    <style>

        .form{

            width: 500px;
            height: 300px;
            margin: auto;
        }
    </style>

 
   
<div class="container">
<form action="{{url('information_update_confirm', $information->id)}}" method="post" enctype="multipart/form-data" class="form">
  @csrf

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{$information->title}}" placeholder="Title">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <textarea class="form-control" id="editor" name="description" rows="3">{{$information->description}}</textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">status</label>
  <select name="status" id="" >
  <option  value="{{$information->status}}" selected="">{{$information->status}}</option>
  @foreach($status_change as $status_change)
                    
  <option value="{{$status_change->status_name}}">{{$status_change->status_name}}</option>
                    
  @endforeach
  </select>
</div>
<div>
  <input type="submit" value="submit" class="btn btn-primary">
</div>
    
</form>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>

<script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ),{
                                  ckfinder:{
                                    uploadUrl:'{{route('ckeditor.upload').'?_token='.csrf_token()}}'
                                  }
                                } )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
</body>
</html>