<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\comment;
use App\Models\product;
use App\Models\user;
use App\Models\order;
use App\Models\reply;
use App\Models\contact;
use App\Models\information;
use App\Models\informshow;
use App\Models\status;
use App\Notifications\SendEmailNotification;
use Auth;
// use Illuminate\Notifications\Notification;

use Illuminate\Support\Facades\Notification;


use PDF;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminController extends Controller
{
   public function category()
   {
   
     

      if(Auth::id())
     {

      if(!Auth::user()->isSubAdmin() && !Auth::user()->isAdmin()){
         return redirect("/");
      }

      $data = category::all();
      return view('admin.category', compact('data'));
     }
     else{

      return redirect('login');
     }
   }

   public function usershow()
   {

      $product=product::where('user_id', Auth::user()->id)->paginate(6);
            return view('user_products',compact('product'));
   }

   public function ordershow()
   {
      $user_id = Auth::user()->id;
      $order=order::where('owner_id', $user_id )->get();
            return view('home.orderlist',compact('order'));
   }
   public function orderdelete($id){

   
      $order=order::find($id);
     $order->delete();
     return back();
   }


   public function add_category(Request $request)
   {

      $data = new category();
      $data->category_name = $request->name;
      $data->save();
      return redirect()->back()->with('message', 'category added successfully');
   }

   public function delete_category($id)
   {
      if(!Auth::user()->isAdmin()){
         return redirect("/");
      }
      $data = category::find($id);
      $data->delete();
      return redirect()->back()->with('messag', 'category deleted successfully');
   }

   public function add_product()
   {


      if(Auth::id()){
      if(!Auth::user()->isAdmin()  && !Auth::user()->isUser()){
         return redirect("/");
      }
      $category = category::all();
      return view('admin.product', compact('category'));
   }
   else{

      return redirect('login');
   }
   }
   public function dataadd(Request $request)
   {

      $product = new product ();

      $product->user_id = Auth::user()->id;
      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->quantity = $request->quantity;
      $product->category = $request->category;
      $product->discount_price = $request->discount_price;

      $image = $request->image;
      $imagename = time() . '.' . $image->getClientOriginalExtension();
      $request->image->move('assets', $imagename);
      $product->image = $imagename;
      
      if ($request->video) {
      $video = $request->video;
      $videoname = time() . '.' . $video->getClientOriginalExtension();
      $request->video->move('assets', $videoname);
      $product->video = $videoname;
      }
      // $data = $request->all();
      // $data['user_id'] = Auth::id();
      // $data['image'] = $imagename;

      // Product::create($data);


      $product->save();
      return redirect()->back();
   }

   public function show_product()
   {
      $data = product::all();
      return view('admin.show_product', compact('data'));
   }

   public function delete_product($id)
   {

      $data = product::find($id);
      $data->delete();
      return redirect()->back()->with('messag', 'product deleted successfully');
   }

   public function update_product($id)
   {
      $category = category::all();
      $data = product::find($id);
      return view('admin.update_product', compact('data', 'category'));
   }

   public function update_confirm(Request $request, $id)
   {
      $data = product::find($id);


      $data->title = $request->title;
      $data->description = $request->description;
      $data->price = $request->price;
      $data->quantity = $request->quantity;
      $data->category = $request->category;
      $data->discount_price = $request->discount_price;
      if ($request->image) {

         $image = $request->image;
         $imagename = time() . '.' . $image->getClientOriginalExtension();
         $request->image->move('assets', $imagename);
         $data->image = $imagename;
      }

      $data->save();
      return redirect()->back()->with('messag', 'product updated successfully');
   }

   //for user post
   
   
   public function nano(){
 
 

     $reply=reply::all();
     $comment=comment::all();
      
     $product=product::where('category','seeds')->get();
     return view('home.be',compact('product','comment','reply'));
  }

  public function machine(){
 
 

   $reply=reply::all();
   $comment=comment::all();
    
   $product=product::where('category','machine')->get();
   return view('home.machine',compact('product','comment','reply'));
}
  
  public function order(){

   if(!Auth::user()->isAdmin()){

      return redirect('/');
   }
$order=order::all();
return view('admin.order',compact('order'));

  }
  public function delivered($id)
  {

    $order=order::find($id);
    $order->delivery_status="delivered";
    $order->payment_status="paid";

    $order->save();
    return redirect()->back();

  }
  public function print_pdf($id){

   $order=order::find($id);
$pdf=PDF::loadView('admin.pdf',compact('order'));
return $pdf->download('order_details.pdf');
  }

  public function search(Request $request){

   $searchText=$request->search;
   $order=order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")
   ->orWhere('product_title','LIKE',"%$searchText%")->get();
   return view('admin.order',compact('order'));


  }

  public function send_email(){

   $user=user::all();
   return view('admin.email',compact('user'));
  }
  public function send_user_email(Request $request){


   $user=user::all();

   $details=[

      'greeting'=> $request->greeting,
      'firstline'=>$request->firstline,
      'body'=>$request->body,
      'btn'=>$request->btn,
      'url'=>$request->url,
      'lastline'=>$request->lastline,


     
      
   ];
   Notification::send($user ,new SendEmailNotification($details));
  

   return redirect()->back();

  }

  public function contact(Request $request){

   if(Auth::user())
   {

      $contact=new contact();

   $contact->name=$request->name;
   $contact->email=$request->email;
   $contact->message=$request->message;

   $contact->save();
   return redirect()->back();
   }
   else{

      return redirect('login');
   }



  }
  public function contact_information()

  {
   $contact=contact::all();
   

   return view('admin.contact_information',compact('contact'));
  }

  public function agri_information(){


   return view('admin.informshow');
  }
  public function information(Request $request)
  {

   $information=new informshow();
   $information->title=$request->title;
   $information->status=$request->status;
   $information->description=$request->description;

   $data = explode(' ', strtolower($this->RemoveSpecialChar($request->title)));
            $url = '';
            foreach ($data as $key=>$d){
                if ($key == 0){
                    $url .= $d;
                }else{
                    $url .= '-'.$d;
                }
            }

            $exists = informshow::where('url', $url)->first();

            if ($exists){
                $menu_url = $url.'-'.rand(0, 1000);
            }else{
                $menu_url = $url;
            }
            $information->url=$menu_url;
            

   if($request->hasFile('upload')){

      $originName=$request->file('upload')->getClientOriginalName();
      $fileName=pathinfo($originName,PATHINFO_FILENAME);
      $extension=$request->file('upload')->getClientOriginalExtension();
      $fileName=$fileName.''.time().'.'.$extension;

      $request->file('upload')->move(public_path('media'),$fileName);
      $url=asset('media/'.$fileName);
      return response()->json(['fileName'=>$fileName,'uploaded'=>1,'url'=>$url]);
  
   }
   $information->save();
   return redirect()->back();


  }



//   public function upload(Request $request){

//    $image = $request->image;
//       $imagename = time() . '.' . $image->getClientOriginalExtension();
//       $request->image->move('assets', $imagename);
//      // $product->image = $imagename;
//   }


public function information_show(){

   $information=informshow::all();
    return view('admin.information_show',compact('information'));
}

public function delete_information($id)
{


   $information=informshow::find($id);
   $information->delete();
   return redirect()->back();
}

public function information_update($id)
{

   $status_change=status::all();
   $information=informshow::find($id);
   return view('admin.information_update',compact('information','status_change'));
   

}
public function information_update_confirm(Request $request,$id)
{
   // echo $id; die();
   // dd($request->all());
   $information=informshow::find($id);
   // dd($information); 
   $information->title=$request->title;
   $information->status=$request->status;
   $information->description=$request->description;

   $data = explode(' ', strtolower($this->RemoveSpecialChar($request->title)));
            $url = '';
            foreach ($data as $key=>$d){
                if ($key == 0){
                    $url .= $d;
                }else{
                    $url .= '-'.$d;
                }
            }

            $exists = informshow::where('url', $url)->first();

            if ($exists){
                $menu_url = $url.'-'.rand(0, 1000);
            }else{
                $menu_url = $url;
            }
            $information->url=$menu_url;
            

   if($request->hasFile('upload')){

      $originName=$request->file('upload')->getClientOriginalName();
      $fileName=pathinfo($originName,PATHINFO_FILENAME);
      $extension=$request->file('upload')->getClientOriginalExtension();
      $fileName=$fileName.''.time().'.'.$extension;

      $request->file('upload')->move(public_path('media'),$fileName);
      $url=asset('media/'.$fileName);
      return response()->json(['fileName'=>$fileName,'uploaded'=>1,'url'=>$url]);
  
   }
   $information->save();
   return redirect()->back();




}
public function RemoveSpecialChar($str)
{
    $res = preg_replace('/[\`\~\!\@\#\$\%\^\&\*\(\)\{\}\:\;\|\<\>\,\.\/\" "]+/', ' ', $str);
    return $res;
}

public function status_add(){

   $status_change=status::all();
   return view('admin.status_add',compact('status_change'));


}
public function status_submit(Request $request){

   $status=new status();
   $status->status_name=$request->status_name;
   $status->save();
   return redirect()->back();

}



}
