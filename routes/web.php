<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MetalsController; 
use App\Http\Controllers\Admin\PlansController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeDeliveryController;



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


Route::get('/dashboards', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth'])->name('dashboard')->middleware(['auth','admin'])->name('dashboard');

// Route::get('/admin/dashboard', function () {
//     return view('admin.admin');
// })->middleware(['auth'])->name('admin-dashboard');
Route::group([
            'prefix' => 'dashboard',
            'middleware' => ['auth','admin']], function() {
                // Route::get('/dashboard', function () {
                //     die("k");
                //     return view('admin.dashboard');
                // })->name('dashboards');
                /* -----------------Product Section ------------------------------*/
                Route::get('/options', function () {
                    return view('admin.product-attribute.attribute-value');
                });
              
                 Route::get('add-product',[ProductController::class,'addDisplay']);
                 Route::post('insert-product',[ProductController::class,'insertProduct']);
              //   Route::resource('add-product',CategoriesController::class);
                 Route::get('/products', function () {
                    return view('admin.products.index');
                 });
                 Route::get('products',[ProductController::class,'productDisplay']);
        
                 Route::get('edit-product/{id}', [ProductController::class,'editProductView']);
              
                
  
                  /* -----------------Order Section ------------------------------*/
                Route::get('/orders',[OrdersController::class,'index']);
                Route::get('/xmas-homedelivery-orders',[OrdersController::class,'xmasOrderHomeDelivery']);
            
         

                  /* -----------------plan Section ------------------------------*/
                Route::get('plans',[PlansController ::class,'index']);
                Route::get('/delete-product/{id}', [ProductController::class,'deleteProduct']);
                Route::post('/update-product', [ProductController::class,'updateProduct']);

                Route::get('users',[UserController::class,'index']);
                Route::get('/user-status-toggle/{id}', [UserController::class,'statusToggle']);
                Route::get('/view-user/{id}', [UserController::class,'viewUser']);
                Route::get('/view-invoice/{id}',[OrdersController::class,'viewInvoice']);
                Route::get('bulk-product',[ProductController::class,'bulkProductDisplay']);
                Route::get('/bulk-orders',[OrdersController::class,'bulkOrders']);
                Route::get('/view-invoice-bulk-order/{id}',[OrdersController::class,'viewInvoiceBulk']);
                Route::get('/add-bulk-product',[ProductController::class,'addBulkProductView']);
                Route::post('insert-bulk-product',[ProductController::class,'insertBulkProduct']);
                Route::get('/delete-bulk-product/{id}', [ProductController::class,'deleteBulkProduct']);
                Route::get('/edit-bulk-product/{id}', [ProductController::class,'editBulkProduct']);
                Route::post('/update-bulk-product', [ProductController::class,'updateBulkProduct']);
                Route::post('/print', [OrdersController::class, 'export']);
                Route::post('/print-bulk', [OrdersController::class, 'exportBulk']);
                Route::get('/order-quantity', [OrdersController::class, 'productQuantity']);
                Route::get('/order-quantity-bulk', [OrdersController::class, 'productQuantityBulk']);
                Route::get('/test-mail', [OrdersController::class, 'mail']);
                Route::get('/notify', [NotificationController::class, 'sendMessage']);
                Route::post('/send-pushnotification', [NotificationController::class,'sendMessage']);
                Route::post('/send-custom-mail', [NotificationController::class,'createMail']);
                Route::get('/test', function () {
                return view('admin.tmail');
             });
             Route::get('/create-push-notification', function () {
              return view('admin.push-notification');
           });
           Route::get('/create-custome-mail', function () {
            return view('admin.create-mail');
         });
         // home delivery 
         Route::get('/category',[HomeDeliveryController::class,'listCategory']);
         Route::get('/delete-category/{id}',[HomeDeliveryController::class,'deleteCategory']);
         Route::get('/delete-home-delivery-product/{id}',[HomeDeliveryController::class,'deleteProduct']);
         Route::get('/add-category', function () {
            return view('admin.products.add-category');
         });
         Route::get('/home-deleiver-products',[HomeDeliveryController::class,'listProducts']);
         Route::get('/add-home-deleivery-products', function () {
            return view('admin.products.add-home-delivery-product');
         });
         Route::get('/edit-home-delivery-product/{id}', [HomeDeliveryController::class,'editProductView']);
         Route::post('/add-category', [HomeDeliveryController::class,'addcategory']);
         Route::post('/insert-homedelivery-product', [HomeDeliveryController::class,'addProduct']);
         Route::get('/home-delivery-orders',[OrdersController::class,'HomeDeliveryOrders']);
         Route::get('/view-postcodes',[UserController::class,'viewPostalCodes']);
         Route::get('/add-post-code', function () {
            return view('admin.postal.add-code');
         });
         Route::post('/insert-postcode', [UserController::class,'addZipCode']);
         Route::get('/delete-post-code/{id}',[UserController::class,'deletePostCode']);
         Route::get('/edit-post-code/{id}',[UserController::class,'editPostCode']);
         Route::post('/update-postcode', [UserController::class,'updatePostCode']);
         Route::get('/view-invoice-homedelivery/{id}',[OrdersController::class,'viewInvoiceHomedelivery']);
         

            
});
// home routes
Route::get('/',[HomeController::class,'index'])->name('home');















require __DIR__.'/auth.php';

