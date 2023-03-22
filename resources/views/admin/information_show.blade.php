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

    
  </head>
  <body>

  <style>

    table{
        margin: auto;
    }
    table tr .th{
        padding: 50px;
        border: 2px solid cadetblue;
    }
  </style>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
         
   <table>
    <tr>
        <th class="th">url</th>
        <th class="th">Delete</th>
        <th class="th">Update</th>
    </tr>

    @foreach($information as $information)
    <tr>
        <td class="th"><a  href="{{url('/',$information->url)}}">{{$information->url}}</a></td>
        <td class="th"><a class="btn btn-danger" href="{{url('delete_information',$information->id)}}">delete</a></td>
        <td class="th"><a class="btn btn-warning" href="{{url('information_update',$information->id)}}">update</a></td>
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