<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
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
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   </head>
   <body>

   <style>

    .center{

        margin: auto;
        text-align: center;
        padding: 30px;
    }
    table,th,td{
        border: 1px solid grey;
    }
    .th{

        font-size: 20px;
        padding: 5px;
        background-color: salmon;
    }
   </style>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
       
         <!-- end slider section -->

         @if(session()->has('messag'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('messag')}}

            </div>

          @endif


         <div class="center">
        <table>
          
        <tr>
          <th class="th">Product Title</th>
          <th class="th">prodcut quantity</th>
          <th class="th">price</th>
          <th class="th">Image</th>
          <th class="th">Action</th>
          <th class="th">ownerid</th>

        </tr>

        <?php $totalprice=0 ?>
    @foreach($cart as $cart)
        <tr>
            <td>{{$cart->product_title}}</td>
            <td>{{$cart->quantity}}</td>
            <td>{{$cart->price}}</td>
            <td><img style="width: 200px;height:150px" src="/assets/{{$cart->image}}"></td>
            <td><a class="btn btn-danger" onclick="return confirm('Are you sure to romove this product')" href="{{url('remove_cart',$cart->id)}}">remove</a></td>
            <td>{{$cart->owner_id}}</td>
        </tr>
        <?php $totalprice=$totalprice + $cart->price?>
    @endforeach

        </table>

        <div>
            <h1 style="margin-right:150px;padding-top:10px;font-size:20px">Total Price=${{$totalprice}}</h1>
        </div>

      
      </div>

      <div class="center">
        <h1 style="font-size: 20px;margin-bottom:10px; padding-bottom:10px">Proceed to Order</h1>
        <a href="{{url('cash_order')}}" class="btn btn-danger">Cash on Delivery</a>
        <!-- <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay Using Card</a> -->

        
        <a href="{{url('exampleEasyCheckout',$totalprice)}}" class="btn btn-danger">online payment</a>
      </div>
      </div>
      <!-- why section -->
    
     
      
      
      
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
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