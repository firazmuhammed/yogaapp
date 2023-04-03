<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\APIController;
use App\Http\Controllers\API\PassportAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('get-plans',[APIController::class,'getPlans']);
Route::get('get-products/{id}',[APIController::class,'getProducts']);
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::get('get-data', [PassportAuthController::class, 'getData']);
Route::post('order-product', [APIController::class, 'orderProduct']);
Route::post('generete-card-number', [APIController::class, 'viewCardNumber']);
Route::get('get-bulk-products', [APIController::class, 'getBulkProducts']);
Route::post('bulk-order', [APIController::class, 'bulkOrder']);
Route::post('payment-intent', [APIController::class, 'createIntent']);
Route::post('search-postal-code', [APIController::class, 'serachPostalCode']);
Route::get('get-categories', [APIController::class, 'getCategories']);
Route::get('get-products-home-delivery/{id}',[APIController::class,'getHomeDeliveryProducts']);
Route::get('home-delivery-detailes/{id}',[APIController::class,'getHomeDeliverySingle']);
Route::post('home-delivery-order', [APIController::class, 'HomeDeliveryOrder']);
Route::get('mail', [APIController::class, 'sendMail']);
Route::post('get-user-password', [APIController::class, 'getPassword']);
Route::post('time-slot-count',[APIController::class,'timeSlotCount']);

