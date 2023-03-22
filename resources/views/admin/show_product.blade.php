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
     body{

      overflow-x: scroll;
     }
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
      .image_size{

        width:150px;
       height:150px;
      }

      .th_style{
        padding:8px;
      }
      @media(max-width:600px)
      {

        table th{

          display: none;
        }
        table,table tr,table td{

          display: block;
          width: 100%;
          
        }
        table tr{

          margin-bottom: 15px;
        }
        table tr td{
          text-align: right;
          padding-left: 15%;
          position: relative;
        }
        table td:before{

          content: attr(data-label);
          position: absolute;
          left: 0;
          width: 50%;
          padding-left: 15px;
          font-weight: 600;
          font-size: 14px;
          text-align: left;
         
        }
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
            <h2 class="text-size">All Products</h2>


            @if(session()->has('messag'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('messag')}}

            </div>

          @endif

         <table class="center" border="1px">

         <tr>
          <th class="th_style">product title</th>
          <th class="th_style">Description</th>
          <th class="th_style">quantity</th>
          <th class="th_style">Category</th>
          <th class="th_style">price</th>
          <th class="th_style">Discount_price</th>
          <th class="th_style">product Image</th>
          <th class="th_style">Delete</th>
          <th class="th_style">Edit</th>
         </tr>

         
         @foreach($data as $data)
         <tr>

         <td data-label=" title">{{$data->title}}</td>
         <td data-label="description">{{$data->description}}</td>
         <td data-label="quantity">{{$data->quantity}}</td>
         <td data-label="category">{{$data->category}}</td>
         <td data-label="price">{{$data->price}}</td>
         <td data-label="discount">{{$data->discount_price}}</td>
         
         <td data-label="image"class="pb-5 pt-5">
          <img class="image_size mt-4 mb-4" src="/assets/{{$data->image}}" alt="">
         </td>
         <td data-label="delete"> <a class="btn btn-primary" onclick="return confirm('are you sure to delete this')" href="{{url('/delete_product',$data->id)}}">Delete</a></td>
         <td data-label="edit"><a class="btn btn-primary"href="{{url('/update_product',$data->id)}}">Edit</a></td>
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