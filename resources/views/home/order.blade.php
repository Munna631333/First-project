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
    table,th,td{

        border: 1px solid black ;
    }
    .th{

        padding: 10px;
        background-color: skyblue;
        font-size: 15px;
        font-weight: bold;
    }

    </style>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         
      
      <!-- arrival section -->
      
      <!-- end client section -->
      <!-- footer start -->
     
      <div style="margin:auto;">

      <table>

      <tr>
        <th class="th">Product Title</th>
        <th class="th">Quantity</th>
        <th class="th">Price</th>
        <th class="th">Payment Status</th>
        <th class="th">Delivery Status</th>
        <th class="th">Image</th>
        <th class="th">Cancel Order</th>
      </tr>
      <?php $totalprice=0 ?>
      @foreach($order as $order)
      <tr>

      <td>{{$order->product_title}}</td>
      <td>{{$order->quantity}}</td>
      <td>{{$order->amount}}</td>
      
      <td>{{$order->status}}</td>

      <td>{{$order->delivery_status}}</td>
      <td><img style="height: 100px; width:150px" src="assets/{{$order->image}}" alt=""></td>
      
      
      <td>@if($order->delivery_status=='processing')
          <a onclick="return confirm('are you sure to cancel this order!!')"  class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">cancel order</a>
   @else

   <p>Not Allowed</p>

   @endif
   </td>
      </tr>
      <?php $totalprice=$totalprice + $order->amount?>
      @endforeach
      </table>

      <div>
            <h1 style="margin-left:100px;padding-top:10px;font-size:20px">Total Price=${{$totalprice}}</h1>
        </div>
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