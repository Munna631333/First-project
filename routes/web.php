<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BotManController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/







route::get('/', [HomeController::class, 'index']);
//->name('home-page');






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

   // route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth','verified');
    route::get('/redirect', [HomeController::class, 'redirect']);
     
   


    route::get('/category', [AdminController::class, 'category']);


    route::post('/add_category', [AdminController::class, 'add_category']);

    route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
    route::get('/add_product', [AdminController::class, 'add_product']);
    route::get('/contact_information', [AdminController::class, 'contact_information']);
    route::get('/usershow', [AdminController::class, 'usershow']);


    route::post('/dataadd', [AdminController::class, 'dataadd']);
    route::post('/dataadd', [AdminController::class, 'dataadd']);
    
    route::post('/contact', [AdminController::class, 'contact']);
   
    route::get('/show_product', [AdminController::class, 'show_product']);
    route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
    route::get('/update_product/{id}', [AdminController::class, 'update_product']);
    route::post('/update_confirm/{id}', [AdminController::class, 'update_confirm']);
    route::get('/product_details/{id}', [HomeController::class, 'product_details']);
    route::post('/add_category/{id}', [HomeController::class, 'add_category']);
    route::get('/show_cart', [HomeController::class, 'show_cart']);
    route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

    route::get('/show_order', [HomeController::class, 'show_order']);
  
    route::get('/ordershow', [AdminController::class, 'ordershow']);
    route::get('/delete/order/{id}', [AdminController::class, 'orderdelete']);
    route::get('/agri_information', [AdminController::class, 'agri_information']);
    route::get('/information_show', [AdminController::class, 'information_show']);
    route::get('/status_add', [AdminController::class, 'status_add']);
    route::post('/status_submit', [AdminController::class, 'status_submit']);
    route::post('/information', [AdminController::class, 'information'])->name('ckeditor.upload');

    route::get('/information', [HomeController::class, 'information']);
    route::get('/delete_information/{id}', [AdminController::class, 'delete_information']);
    route::get('/information_update/{id}', [AdminController::class, 'information_update']);
    route::post('/information_update_confirm/{id}', [AdminController::class, 'information_update_confirm']);
    route::get('/{url}', [HomeController::class, 'showing']);




    
    route::get('/cash_order', [HomeController::class, 'cash_order']);
    route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);

    route::get('category/seeds', [AdminController::class, 'nano']);
    route::get('category/machine', [AdminController::class, 'machine']);
    route::get('/order/produ', [AdminController::class, 'order']);
    route::get('/search', [AdminController::class, 'search']);
    route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);

    route::post('/add_comment', [HomeController::class, 'add_comment']);
    route::post('/add_reply', [HomeController::class, 'add_reply']);


    route::get('/tree/mahbubur', [HomeController::class, 'product_search']);
    route::get('/products/all', [HomeController::class, 'products']);
    



   
    route::get('/delivered/{id}', [AdminController::class, 'delivered']);
    route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);
    route::get('/send_email/email', [AdminController::class, 'send_email']);
    route::post('/send_user_email', [AdminController::class, 'send_user_email']);


    Route::post('stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');

    // SSLCOMMERZ Start
Route::get('/exampleEasyCheckout/{totalprice}', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

});

route::get('/botman', [BotManController::class, 'hahdle']);

    route::post('/botman', [BotManController::class, 'handle']);


    
// Route::group([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ], function () {
  
//     route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth','verified');
     
    
//     route::get('/', [HomeController::class, 'index'])->name('home-page');


//     route::get('/category', [AdminController::class, 'category']);


//     route::post('/add_category', [AdminController::class, 'add_category']);

//     route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
//     route::get('/add_product', [AdminController::class, 'add_product']);
//     route::get('/contact_information', [AdminController::class, 'contact_information']);
//     route::get('/usershow', [AdminController::class, 'usershow']);


//     route::post('/dataadd', [AdminController::class, 'dataadd']);
//     route::post('/dataadd', [AdminController::class, 'dataadd']);
    
//     route::post('/contact', [AdminController::class, 'contact']);
   
//     route::get('/show_product', [AdminController::class, 'show_product']);
//     route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
//     route::get('/update_product/{id}', [AdminController::class, 'update_product']);
//     route::post('/update_confirm/{id}', [AdminController::class, 'update_confirm']);
//     route::get('/product_details/{id}', [HomeController::class, 'product_details']);
//     route::post('/add_category/{id}', [HomeController::class, 'add_category']);
//     route::get('/show_cart', [HomeController::class, 'show_cart']);
//     route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

//     route::get('/show_order', [HomeController::class, 'show_order']);
  
//     route::get('/ordershow', [AdminController::class, 'ordershow']);
//     route::get('/delete/order/{id}', [AdminController::class, 'orderdelete']);
//     route::get('/agri_information', [AdminController::class, 'agri_information']);
//     route::get('/information_show', [AdminController::class, 'information_show']);
//     route::get('/status_add', [AdminController::class, 'status_add']);
//     route::post('/status_submit', [AdminController::class, 'status_submit']);
//     route::post('/information', [AdminController::class, 'information'])->name('ckeditor.upload');

//     route::get('/information', [HomeController::class, 'information']);
//     route::get('/delete_information/{id}', [AdminController::class, 'delete_information']);
//     route::get('/information_update/{id}', [AdminController::class, 'information_update']);
//     route::post('/information_update_confirm/{id}', [AdminController::class, 'information_update_confirm']);
//     route::get('/{url}', [HomeController::class, 'showing']);




    
//     route::get('/cash_order', [HomeController::class, 'cash_order']);
//     route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);

//     route::get('category/seeds', [AdminController::class, 'nano']);
//     route::get('category/machine', [AdminController::class, 'machine']);
//     route::get('/order/produ', [AdminController::class, 'order']);
//     route::get('/search', [AdminController::class, 'search']);
//     route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);

//     route::post('/add_comment', [HomeController::class, 'add_comment']);
//     route::post('/add_reply', [HomeController::class, 'add_reply']);


//     route::get('/tree/mahbubur', [HomeController::class, 'product_search']);
//     route::get('/products/all', [HomeController::class, 'products']);
    



   
//     route::get('/delivered/{id}', [AdminController::class, 'delivered']);
//     route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);
//     route::get('/send_email/email', [AdminController::class, 'send_email']);
//     route::post('/send_user_email', [AdminController::class, 'send_user_email']);


//     Route::post('stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');

//     // SSLCOMMERZ Start
// Route::get('/exampleEasyCheckout/{totalprice}', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

// Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
// Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

// Route::post('/success', [SslCommerzPaymentController::class, 'success']);
// Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
// Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

// Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
// //SSLCOMMERZ END


    

// });
