<header class="header_section bg-success">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="/"><img width="250" src="" alt="" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav"  >
                        <li class="nav-item active">
                           <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item dropdown" id="service">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             Services
                           </a>
                           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <li class="nav-item">
                           <a class="nav-link" href="usershow">productshow</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" href="add_product">postproduct</a>
                        </li>

                       
                           <a class="nav-link" href="ordershow">ordershow</a>
                        

                        <li class="nav-item">
                           <a class="nav-link" href="information">information</a>
                        </li>
                             
                           </ul>
                         </li>
                         @endauth
                     @endif
                        

                        <li class="nav-item">
                           <a class="nav-link" href="{{url('products/all')}}" >Products</a>
                        </li>
                        

                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             category
                           </a>
                           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <li class="nav-item">
                           <a class="nav-link" href="{{url('category/seeds')}}">seeds</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" href="{{url('category/machine')}}">machine</a>
                        </li>
                             
                           </ul>
                         
                        <li class="nav-item">
                           <a class="nav-link" href="#">Contact</a>
                        </li>
                          
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_cart')}}">Carts</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_order')}}">Order</a>
                        </li>
                          
                      
                        
                        
                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form>
                        
                        @if(Auth::check())
                        <li class="nav-item">
                        <x-app-layout>
   
                         </x-app-layout>
   
                        </li>
                       @else
                        <li class="nav-item">
                           <a class="btn btn-primary" id="logincss" class="nav-link"  
                           href="{{ route('login') }}">Login</a>
                        </li>
                    

                        <li class="nav-item">
                           <a  class="nav-link"  href="{{ route('register') }}">Registration</a>
                        </li>
                     
                     @endif
                     </ul>
                  </div>
               </nav>
            </div>
         </header>