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
      <div class="hero_area center">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
       
         <!-- end slider section -->
         <h2 style="color:blue;font-weight:bolder;margin-top:30px;margin-left:200px;margin-bottom:18px; font-size:40px">Agricultural Information:</h2>

         @foreach($information as $information)
   <div style="margin-left:200px;margin-bottom:15px;">
    ({{$information->id}})

   <a href="{{url('/',$information->url)}}">{{$information->url}}</a>
   </div>
   @endforeach
      <!-- why section -->
    
     
      
      
      
      <!-- footer start -->
      
      <!-- footer end -->
      
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