<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

    <style>

      .center{
       text-align:center;
       
       paddig-top:40px;

      }
      .h1text{

        text-size:40px;
        padding-bottom:40px;
      }

      .textcolor{

        color:black;
      }

      .center_div{

        margin:auto;
        padding-top:20px;
        text-align:center;
        margin-top:30px;
        border:3px solid white;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           
          @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('message')}}

            </div>

          @endif
            <div class="center">
            <h1 class="h1text">Add category</h1>

            <form action="add_category" method="post" >
              @csrf

            <input class="textcolor" type="text" name="name" placeholder="write category name">
            <input type="submit" class="btn btn-success" name="submit" value="Add Category" >
            </form>

            </div>
            
            <table class="center_div">
             
            

          @if(session()->has('messag'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('messag')}}

            </div>

          @endif

            <tr>
              <td>Category-name</td>
              <td>Action</td>
            </tr>

            @foreach($data as $data)

            <tr>
              <td>{{$data->category_name}}</td>
              <td>@if(Auth::user()->isAdmin())
                <button><a class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a></button>
              @endif</td>
            </tr>
            @endforeach
            </table>
        
            </div>
          </div>
       
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script') 
    <!-- End custom js for this page -->
  </body>
</html>