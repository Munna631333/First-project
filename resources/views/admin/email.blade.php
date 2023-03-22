<!DOCTYPE html>
<html lang="en">
  <head>

  <base href="/public">
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

        label{

            display: inline-block;
            width: 300px;
            font-size: 15px;
            font-weight: bold;
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
        
        <div class="main-panel" >
          <div class="content-wrapper" >

          <h1 style="text-align:center">Send Email to All Users</h1>

        <form action="{{url('send_user_email')}}" method="post">

        @csrf

          <div style="text-align: center; margin-top:40px">

          <label for="email greeting">Email Greeting:</label>
          <input style="color:black;" type="text" name="greeting">
          </div>

          <div style="text-align: center; margin-top:40px">

          <label for="email greeting">Email FirstLine:</label>
          <input style="color:black;" type="text" name="fristline">
          </div>

          <div style="text-align: center; margin-top:40px">

          <label for="email greeting">Email Body:</label>
          <input style="color:black;" type="text" name="body">
          </div>
          <div style="text-align: center; margin-top:40px">

          <label for="email greeting">Email Button Name:</label>
          <input style="color:black;" type="text" name="btn">
          </div>

          <div style="text-align: center; margin-top:40px">

          <label for="email greeting">Email Url:</label>
          <input style="color:black;" type="text" name="url">
          </div>

          <div style="text-align: center; margin-top:40px">

          <label for="email greeting">Email LastLine:</label>
          <input style="color:black;" type="text" name="lastline">
          </div>

          <div style="text-align: center; margin-top:40px">

        
          <input type="submit" name="Send Email" class="btn btn-warning ">
          </div>

        </form>


          </div>
        </div>
          
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script') 
    <!-- End custom js for this page -->
  </body>
</html>