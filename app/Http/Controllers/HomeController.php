<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\product;
use App\Models\cart;
use App\Models\category;
use App\Models\order;
use App\Models\comment;
use App\Models\informshow;
use App\Models\reply;
use Session;
use Stripe;


class HomeController extends Controller
{

    public function index()

    {

        $product=product::paginate(6);
        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();
        return view('home.userpage',compact('product','comment','reply'));
    }
    public function redirect()
    {

        $usertype=Auth::user()->usertype;
       
        
        if($usertype==1)
        {
            $total_product=product::all()->count();
            $total_orders=order::all()->count();
            $total_customers=user::all()->count();
             
            $order=order::all();
            $total_revenue=0;
            foreach($order as $order)
            {

                $total_revenue=$total_revenue + $order->price;
            }

            $total_delivered=order::where('delivery_status','delivered')->get()->count();
            $total_processed=order::where('delivery_status','processing')->get()->count();

            return view('admin.home',compact('total_product','total_orders','total_customers','total_revenue','total_delivered','total_processed'));
        } 
        elseif($usertype==2){

            return view('admin.home');
        }
        
        else{

            $product=product::orderby('id','DESC')->paginate(6);
            $comment=comment::orderby('id','desc')->get();
            $reply=reply::all();
        return view('home.userpage',compact('product','comment','reply'));
        }
        
    }
    

    public function products(){

        $product=product::paginate(12);
            $comment=comment::orderby('id','desc')->get();
            $reply=reply::all();
        return view('home.productall',compact('product','comment','reply'));
    
    }
    public function product_details($id){
        $product=product::find($id);
        
        $category=category::all();
        $cat_name=$product->category;
        $related_products=product::where('category',$cat_name)->get();
        return view('home.product_details',compact('product','related_products'));
    }
    public function add_category(Request $request,$id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $user_id=Auth::user()->id;
            $product=product::find($id);
            $product_exist_id=cart::where('product_id','=',$id)->where('user_id','=',$user_id)->get('id')->first();
            
            if($product_exist_id)
            {
                

               $cart=cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity=$quantity + $request->quantity;

                if($product->discount_price!=null)
    
                {
    
                    $cart->price=$product->discount_price * $cart->quantity; 
                }
                else{
                 
                    $cart->price=$product->price * $cart->quantity;
    
                }
                $cart->save();
                return redirect()->back()->with('messag','product added successfully');

 
                
            }
           
            else{


                $cart=new cart;
                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;
                $cart->product_title=$product->title;
                $cart->owner_id=$product->user_id;
    
                if($product->discount_price!=null)
    
                {
    
                    $cart->price=$product->discount_price * $request->quantity; 
                }
                else{
                 
                    $cart->price=$product->price * $request->quantity;
    
                }
                
                $cart->image=$product->image;
                $cart->product_id=$product->id;
    
                $cart->quantity=$request->quantity;
                $cart->save();
    
                return redirect()->back()->with('messag','product added successfully');
            }

     
        }
        else{


            return redirect('login');
        }


    }

    public function show_cart(){
     
        if(Auth::id())

       { $cart=cart::where('user_id',Auth::user()->id)->get();
         return view('home.showcart',compact('cart'));}
         
         else{

            return redirect('login');
         }
    }

    public function remove_cart($id){

        $cart =cart::find($id);
        $cart->delete();
        return redirect()->back();

    }

    public function cash_order(){

      $user=Auth::user();
      $userid=$user->id;
    

      $data=cart::where('user_id',$userid)->get();
      foreach($data as $data)
      {
        $order=new order;

        $order->name=$data->name;
        $order->email=$data->email;
        $order->phone=$data->phone;
        $order->address=$data->address;
        $order->user_id=$data->user_id;
        $order->product_title=$data->product_title;
        $order->price=$data->price;
        $order->quantity=$data->quantity;
        $order->image=$data->image;
        $order->product_id=$data->product_id;
        $order->owner_id=product::where()->owner_id;
        $order->name=$data->name;

        $order->payment_status='cash on delivery';
        $order->delivery_status='processing';

        $order->save();

        $cart_id=$data->id;
        $cart=cart::find($cart_id);
        $cart->delete();
    
      }

      return redirect()->back()->with('message','we have receives your order.we will connect with you soon..');
    
 
    }

    public function stripe($totalprice){

        return view('home.stripe',compact('totalprice'));

}


public function stripePost(Request $request,$totalprice)
{

   
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create ([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for payment}" 
    ]);
    
    $user=Auth::user();
      $userid=$user->id;

      $data=cart::where('user_id',$userid)->get();
      foreach($data as $data)
      {
    
    $order=new order;

    $order->name=$data->name;
    $order->email=$data->email;
    $order->phone=$data->phone;
    $order->address=$data->address;
    $order->user_id=$data->user_id;
    $order->product_title=$data->product_title;
    $order->price=$data->price;
    $order->quantity=$data->quantity;
    $order->image=$data->image;
    $order->product_id=$data->product_id;
    $order->name=$data->name;
    $order->name=$data->name;

    $order->payment_status='Paid';
    $order->delivery_status='processing';

    $order->save();

    $cart_id=$data->id;
    $cart=cart::find($cart_id);
    $cart->delete();


    
  }

  Session::flash('success', 'Payment successful!');
          
    return back();
  
   
}

public function show_order(){

    if(Auth::id())
    {
        $userid=Auth::user()->id;
        $order=order::where('user_id',$userid)->get();
        return view('home.order',compact('order'));
    }
    else{
        return redirect('login');
    }
}
public function cancel_order($id)
{
$order=order::find($id);
$order->delivery_status='you canceled the order';
$order->save();
return redirect()->back();

}

public function add_comment(Request $request)
{

if(Auth::id()){

    $comment=new comment;
     $comment->name=Auth::user()->name;
     $comment->user_id=Auth::user()->id;
     $comment->comment=$request->comment;
     $comment->save();
     return redirect()->back();
}
else{

    return redirect('login');
}

}
public function add_reply(Request $request){

    if(Auth::id())
    {

        $reply=new reply;

        $reply->name=Auth::user()->name;
        $reply->user_id=Auth::user()->id;
        $reply->comment_id=$request->commentId;
        $reply->reply=$request->reply;

        $reply->save();
        return redirect()->back();


    }
    else{

        return redirect('login');
    }
}

public function product_search(Request $request)
{

    $comment=comment::orderby('id','desc')->get();
    $reply=reply::all();
$search_text=$request->search;
$product=product::where('title','LIKE',"%$search_text%")->where('category','LIKE',"%$search_text%")->paginate(6);
return view('home.be',compact('product','comment','reply'));  

}
public function information()
{

    $information=informshow::all();
    return view('home.displayinformation',compact('information'));
}

public function showing($url){

    // echo $url; die();
    $status=informshow::all()->status='active';
    $information=informshow::where('status',$status)->where('url',$url)->first();
    return view('home.showing',compact('information'));

} 




}