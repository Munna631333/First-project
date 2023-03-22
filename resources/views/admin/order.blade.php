<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles {{asset('home/css/responsive.css')}}-->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" />
      <style>

        .center{

            margin:auto;
            text-align:center;
        }
.h1size{

    font-size:40px;
    padding-bottom:30px;
}
.textcolor{
 
    color:black;
}
label{

    display:inline-block;
    width:200px;
}
.labels{

    margin:10px;
}
option{

   background-color:black;
}

      </style>
    
  </head>
  <body>
    <style>

        .table{
         
            border: 2px solid white;
           margin: auto;
           
            color: white;
            font-size: 0.1rem;
        
           
            
           
        }
        .content-wrapper{
         
          
          border: 1px solid grey;
          overflow-x: scroll;

        }
       
        </style>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel" >
          <div class="content-wrapper" >
           
          <h1 style="text-align: center; padding-bottom:10px">ALL Orders</h1>

          <div style="text-align: center;padding:15px" >

          <form action="{{url('search')}}" method="get">

          @csrf

          <input style="color:black; text-align:center" type="text" name="search" placeholder="seacrh for something" >
          <input type="submit" value="search" class="btn btn-primary">
          </form>
          </div>

          <table  class="table scroll" >
          
          <tr>

          <th class="background">Name</th>
          <th class="background">Email</th>
          <th class="background">Address</th>
          <th class="background">Phone</th>
          <th class="background">Product Title</th>
          <th class="background">Quantity</th>
          <th class="background">Price</th>
          <th class="background">Payment Status</th>
          <th class="background">Delivery Status</th>
          <th class="background">Image</th>
          <th class="background">Delivered</th>
          <th class="background">Print Pdf</th>
          <!-- <th class="background">email send</th> -->
          </tr>

        
@forelse($order as $order)
          <tr>

         <td>{{$order->name}}</td>
         <td>{{$order->email}}</td>
         <td>{{$order->address}}</td>
         <td>{{$order->phone}}</td>
         <td>{{$order->product_title}}</td>
         <td>{{$order->quantity}}</td>
         <td>{{$order->price}}</td>
         <td>{{$order->payment_status}}</td>
         <td>{{$order->delivery_status}}</td>
         <td ><img style="width: 200px;height:100px" src="/assets/{{$order->image}}"></td>
        
         <td>

         @if($order->delivery_status=='processing')
          <a href="{{url('delivered',$order->id)}}" class="btn btn-primary">Deliver</a>
        
          @else
         <p>Delivered</p>

         @endif
        </td>
        <td>
          <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary"> print pdf</a>
        </td>

        <!-- <td><a href="{{url('send_email',$order->id)}}" class="btn btn-info">notifications</a></td> -->


         
        

      
          </tr> 

          @empty

          <tr>

          <td colspan="16">
            No Data Found
          </td>
          </tr>
        @endforelse
          </table>


          
        </div>

        </div>
       
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script') 
    <!-- End custom js for this page -->
  </body>
</html>