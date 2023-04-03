<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Collections;
use App\Models\Images;
use App\Models\Orders;
use App\Models\OrdersProducts;
use Auth;
use App\Models\{State,Districts};
use App\Models\OrderTracker;
class OrderController extends Controller
{
   /**
     * * Author : Firaz
     * Display and edit user orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function myOrders(Request $request)
    {

        $data['orders']=Orders::select('orders.*')
                         ->where('user_id',Auth::user()->id)
                         ->where('order_status','!=','Deliverd')
                         ->get();
                         
        $data['deliverd_orders']=Orders::select('orders.*')
        ->where('user_id',Auth::user()->id)
        ->where('order_status','=','Deliverd')
        ->get();
        return view('users.orders.my-orders',compact('data'));
    }
   /**
     * * Author : Firaz
     * get user address.
     *
     * @return District according to state 
     */
    public function myOrderItems($id)
    {
        $data['orders']=OrdersProducts::select('orders_products.*','products.image','products.metal_gross_weight as weight')
                                ->join('products','products.id','orders_products.product_id')
                                ->where('order_id',$id)
                                ->get();
        return view('users.orders.order-details',compact('data'));
    }

    public function trackOrder($id)
    {
     
        $data['status']=OrderTracker::where('order_id',$id)
                                ->get();
         $data['track']=Orders::select('tracking_id','delivery_partner','tracking_details')
                                ->where('id',$id)
                                ->first();  
                                                 
        return view('users.orders.track-my-order',compact('data'));  
    }

    public function cancelOrder(Request $request)
    {
    
      $order=Orders::findOrfail($request->id);
      $order->order_status="Cancelled";
      $order->cancel_reason=$request->reason;
      $order->save();
      return redirect()->back()->with('success', 'Order cancelled succesfully !');
    }
    

    
}
