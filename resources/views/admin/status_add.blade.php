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

        table
        {
            width: 500px;
            height: 300px;
            margin: auto;
            background: greenyellow;
            
        }
        table tr{
           border: 2px solid black; 
           text-align: center;
             }
             table .cl{

                border: 2px solid black; 
           text-align: center;
             }
    </style>

 
   
<div class="container">
<form action="{{url('status_submit')}}" method="post" enctype="multipart/form-data" class="form">
  @csrf

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">status</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="status_name" value="" placeholder="Status_add" required>
</div>

<div>
  <input type="submit" value="submit" class="btn btn-primary">
</div>
    
</form>

<table>

<tr>
<th class="cl">status_name</th>
<th class="cl">Action</th>
</tr>
@foreach($status_change as $status_change)
<tr>
    <td class="cl">{{$status_change->status_name}}</td>
    <td class="cl"><a href="">Delete</a></td>
</tr>
@endforeach
</table>

</div>




</body>
</html>