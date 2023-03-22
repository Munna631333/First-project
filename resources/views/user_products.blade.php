<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML </title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
        
         <!-- end slider section -->
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

         
         @foreach($product as $data)
         <tr>

         <td>{{$data->title}}</td>
         <td>{{$data->description}}</td>
         <td>{{$data->quantity}}</td>
         <td>{{$data->category}}</td>
         <td>{{$data->price}}</td>
         <td>{{$data->discount_price}}</td>
         
         <td>
          <img class="image_size" src="/assets/{{$data->image}}" alt="">
         </td>
         <td><a class="btn btn-primary" onclick="return confirm('are you sure to delete this')" href="{{url('/delete_product',$data->id)}}">Delete</a></td>
         <td><a class="btn btn-primary"href="{{url('/update_product',$data->id)}}">Edit</a></td>
         </tr>
         @endforeach
         </table>
      </div>
      <!-- why section -->
      
      <!-- end why section -->
      
      <!-- arrival section -->
     
      <!-- end arrival section -->
      
      <!-- product section -->
     
      <!-- end product section -->

      <!-- subscribe section -->
      
      <!-- end subscribe section -->
      <!-- client section -->
      
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">with html</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>