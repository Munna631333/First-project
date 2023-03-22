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

  <style>
      .center{

        margin:auto;
        text-align:center;
        width:80%;
        border:2px solid white;
        margin-top:40px;

      }
      .text-size{
    text-align:center;
    font-size:40px;
    padding-bottom:20px;

      }
      

      .th_style{
        padding:8px;
      }
    </style>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <h2 class="text-size">All Contacts</h2>


            @if(session()->has('messag'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('messag')}}

            </div>

          @endif

         <table class="center" border="1px">

         <tr>
          <th class="th_style">Name</th>
          <th class="th_style">Email</th>
          <th class="th_style">Message</th>
          
         </tr>

         
         @foreach($contact as $contact)
         <tr>

         <td>{{$contact->name}}</td>
         <td>{{$contact->email}}</td>
         <td>{{$contact->message}}</td>
        
         
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