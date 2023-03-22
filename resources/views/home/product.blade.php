<section class="product_section layout_padding" id="pro">
         <div class="container" id="d">
            <div class="heading_container heading_center" >
               <h2>
                  Our <span>products</span>
               </h2>

               <div>

               <form action="{{url('tree/mahbubur')}}" method="GET">
                  @csrf
                  <input style="width: 550px;" type="text" name="search" placeholder="search for something">
                  <input type="submit" name="submit" value="search">
               </form>
               </div>
            </div>

            @if(session()->has('messag'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('messag')}}

            </div>

          @endif
           
            <div class="row" >
            @foreach($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4 ">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                           product_details
                           </a>
                           <form action="{{url('add_category',$products->id)}}" method="post">
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
                     <div class="img-box">
                        <img src="assets/{{$products->image}}" alt="">
                     </div>

                    
                     <div class="detail-box">
                        <h5>
                          {{$products->title}}
                        </h5>

                      @if($products->discount_price!=0)
                        
                      <h6 style="color:red;">
                      Discount price<br>
                        ${{$products->discount_price}}
                        </h6>


                        <h6 style="text-decoration:line-through; color:blue;">
                        ${{$products->price}}
                        </h6>

                        @else

                        <h6 style=" color:blue;">
                        ${{$products->price}}
                        </h6>
                      @endif

                        
                     </div>
                  </div>
                  <div class="video-box" >
                        <video style="width:200px;margin-left:70px;height:90px  " controls src="assets/{{$products->video}}"></video>
                        <p style="margin-left:70px;color:brown;font-weight:bolder; ">product video</p>
                     </div>
               </div>

               
               @endforeach

           
               <span style="padding-top:20px">
               {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
               </span>
         </div>
      </section>