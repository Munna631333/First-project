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
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
        
      <!-- product section -->
      <div class="col-sm-6 col-md-4 col-lg-4" style="width:300px;margin:auto">
                  
                     <div class="img-box" >
                        <img style="width:180% ; height:200px;padding: 20px;" src="/assets/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                          {{$product->title}}
                        </h5>

                      @if($product->discount_price!=0)
                        
                      <h6 style="color:red;">
                      Discount price<br>
                        ${{$product->discount_price}}
                        </h6>


                        <h6 style="text-decoration:line-through; color:blue;">
                        ${{$product->price}}
                        </h6>

                        @else

                        <h6 style=" color:blue;">
                        ${{$product->price}}
                        </h6>
                      @endif
                      <h6>product category:{{$product->category}}</h6>
                      <h6>product description:{{$product->description}}</h6>
                      <h6>product quantity:{{$product->quantity}}</h6>
                      <form action="{{url('add_category',$product->id)}}" method="post">
                              @csrf

                           <div class="row">
                              <div class="col-md-4">
                              <input type="number" name='quantity' value="1" min=1>
                              </div>

                              <div class="col-md-4">
                              <input type="submit" value="Add to cart">
                              </div>
                           </div>
                              
                          
                           </form>
                             
                                                                 
                     </div>

                    
                     

                     



                  </div>

                  <h1 style="font-size: 30px; margin-left:250px; color:blueviolet; font-weight:bold; padding:20px">Related Products:</h1>

                  <div class="row">
                  @foreach($related_products as $related_products)
                     <div class="col-sm-12 col-md-6" style="width: 500px; height:500px">

                    
                  <div  style="width:30%;margin:auto">
                  
                     <div class="img-box" >
                        <img style="width:200% ; height:200px; padding: 20px;" src="/assets/{{$related_products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                          {{$related_products->title}}
                        </h5>

                      @if($related_products->discount_price!=0)
                        
                      <h6 style="color:red;">
                      Discount price<br>
                        ${{$related_products->discount_price}}
                        </h6>


                        <h6 style="text-decoration:line-through; color:blue;">
                        ${{$related_products->price}}
                        </h6>

                        @else

                        <h6 style=" color:blue;">
                        ${{$related_products->price}}
                        </h6>
                      @endif
                      <h6>product category:{{$related_products->category}}</h6>
                      <h6>product description:{{$related_products->description}}</h6>
                      <h6>product quantity:{{$related_products->quantity}}</h6>
                      <form action="{{url('add_category',$product->id)}}" method="post">
                              @csrf

                           <div class="row">
                              <div class="col-md-4 ">
                              <input style="background-color: black; color:white;width:50px"  type="number" name='quantity' value="1" min=1>
                              </div>

                              <div class="col-md-4">
                              <input type="submit" value="Add to cart">
                              </div>
                           </div>
                              
                          
                           </form>
                             
                                                                 
                     </div>

                    
                     

                     



                  </div>

                  


                     </div>
                     @endforeach
                  </div>
 

               </div>

               
      <!-- end product section -->

      <!-- subscribe section -->
     
      <!-- end client section -->
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