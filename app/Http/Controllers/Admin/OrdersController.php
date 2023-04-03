<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use Carbon\Carbon;
use App\Models\OrderDetails;
use App\Models\Products;
use App\Models\BulkOrder;
use App\Models\BulkOrderDetails;
use PDF;
use App\Models\ProductCategories;
use DB;
use App\Models\HomeDeliveryOrders;
use App\Models\HomeDeliveryOrderDetails;


class OrdersController extends Controller
{
    /**
     * * Author : Firaz
     * Display and setting for orders
     *
     * @return \Illuminate\Http\Response
     */
  
      
    /**
     * return all orders
     *
     * @author  <Firaz>
     * @return  orders
     */
     public function index(Request $request)
     {
         
        $data['orders']=Orders::select('orders.*','users.name','users.email','users.mobile','plans.plan_name')
        ->join('users','users.id','=','orders.user_id')
        ->join('plans','plans.id','=','orders.plan_id')
        ->orderBy('id','desc')
        ->where('order_type','=',"Pickup")
        //->ORwhere('order_type','=',NULL)
        ->paginate(40);
        return view('admin.orders.orders',compact('data'));      
     }
     
     public function viewInvoice($id)
     {
        $orders=Orders::select('orders.*','users.name','users.email','users.mobile','users.street','users.suburb','users.pincode','plans.plan_name')
        ->join('users','users.id','=','orders.user_id')
        ->join('plans','plans.id','=','orders.plan_id')
        ->where('orders.id',$id)
        ->first();
        $data['products']=OrderDetails::where('order_id',$id)
   
        ->get();
      
        return view('admin.orders.invoice',compact('data','orders'));     
     }
    public function bulkOrders()
    {
      $data['orders']=BulkOrder::select('bulk_orders.*','users.name','users.email','users.mobile')
      ->join('users','users.id','=','bulk_orders.user_id')
      ->orderBy('id','desc')
      ->paginate(10);
      return view('admin.orders.bulk-orders',compact('data'));      
    }
    public function viewInvoiceBulk($id)
    {
      $orders=BulkOrder::select('bulk_orders.*','users.name','users.email','users.mobile')
      ->join('users','users.id','=','bulk_orders.user_id')
      ->where('bulk_orders.id',$id)
      ->first();
      $data['products']=BulkOrderDetails::where('order_id',$id)
 
      ->get();
    
      return view('admin.orders.invoice-bulk-order',compact('data','orders'));    

    }
    public function export(Request $request)
    {
     // $str_arr = preg_split (",", $request->ids); 
  
      foreach($request->ids as $a)
      {
       $d=$a;
      }
      $array = explode(',', $d);
     // print_r(  $array); die();
     $i=0;
     $data=[];
     foreach($array as $arra)
     {
      // echo $arra;
      $data['a']['x']=Orders::select('orders.*','users.name','users.email','users.mobile','users.street','users.suburb','users.pincode','plans.plan_name')
      ->join('users','users.id','=','orders.user_id')
      ->join('plans','plans.id','=','orders.plan_id')
      ->where('order_id', $arra)
      ->get();
      $data['a']['y']=OrderDetails::where('orders.order_id',[   $arra ])
      ->join('orders','orders.id','=','order_details.order_id')
           
      ->get();
     // print_r( $data1);
  
      //array_push( $data["x"][$i],$data1);
      //array_push( $data["y"][$i],$data2);
           $i++;
          
     }
      
        
           return view('admin.pdf_view',compact('array'));  
      //dd( $data['products']);
        // share data to view
      // view()->share('data',$data,'orders',$orders);
        $pdf = PDF::loadView('admin.pdf_view', compact('orders','data'));
  
        $path = public_path('pdf/');
        $fileName =  time().'.'. 'pdf' ;
        $pdf->save($path . '/' . $fileName);

        $pdf = public_path('pdf/'.$fileName);
        return response()->download($pdf);
    }

    public function exportBulk(Request $request)
    {

      foreach($request->ids as $a)
      {
       $d=$a;
      }
      $array = explode(',', $d);
     // print_r(  $array); die();
     $i=0;
     $data=[];
     foreach($array as $arra)
     {
     $data['a']['x']=BulkOrder::select('bulk_orders.*','users.name','users.email','users.mobile')
      ->join('users','users.id','=','bulk_orders.user_id')
      ->where('bulk_orders.id',$arra)
      ->first();
      $data['a']['y']=BulkOrderDetails::where('order_id',$arra)
      ->get();
     }
     return view('admin.orders.pdf_view_bulk',compact('array'));  
    }

    public function productQuantity()
    {
      $order=OrderDetails::select('products.product_name',DB::raw("sum(order_details.qty)as qty"))
       ->join('products','products.id','=','order_details.product_id')
       ->groupBy('order_details.product_id')
       ->get();
      return view('admin.orders.product-quantity',compact('order'));    
   }
   public function productQuantityBulk()
   {
     $order=OrderDetails::select('products.product_name',DB::raw("sum(order_details.qty)as qty"))
      ->join('products','products.id','=','order_details.product_id')
      ->groupBy('order_details.product_id')
      ->get();
     
     return view('admin.orders.product-quantity-bulk',compact('order'));    
  }


  public function mail()
  {
    $info=BulkOrder::select('bulk_orders.*','users.name','users.email','users.mobile','users.state','users.pincode')
    ->join('users','users.id','=','bulk_orders.user_id')
    ->where('bulk_orders.id',2)
    ->first();
    $data['products']=BulkOrderDetails::where('order_id',2)

    ->get();
    // $info=Orders::select('orders.*','users.name','users.email','users.mobile','users.street','users.suburb','users.pincode','plans.plan_name')
    // ->join('users','users.id','=','orders.user_id')
    // ->join('plans','plans.id','=','orders.plan_id')
    // ->where('orders.id',1)
    // ->first();
    // $data['products']=OrderDetails::where('order_id',1)

    // ->get();
  
    return view('admin.eft',compact('info','data'));
  }

  // home delivery 
  public function HomeDeliveryOrders()
  {
    $data['orders']=Orders::select('orders.*','users.name','users.email','users.mobile','plans.plan_name')
        ->join('users','users.id','=','orders.user_id')
        ->join('plans','plans.id','=','orders.plan_id')
        ->orderBy('id','desc')
        ->where('orders.order_type','=','Home Delivery')
        ->paginate(10);
    return view('admin.orders.home-delivery-orders',compact('data'));      
  }

  // 2022 

  public function xmasOrderHomeDelivery(Request $request)
  { 
  
      
     $data['orders']=Orders::select('orders.*','users.name','users.email','users.mobile','plans.plan_name')
     ->join('users','users.id','=','orders.user_id')
     ->join('plans','plans.id','=','orders.plan_id')
     ->where('orders.order_type','=','Home Delivery')
     ->orderBy('id','desc')
     ->paginate(10);
    return view('admin.orders.orders',compact('data'));      
  }
  public function viewInvoiceHomedelivery($id)
  {
     $orders=Orders::select('orders.*','users.name','users.email','users.mobile','users.street','users.suburb','users.pincode','plans.plan_name')
     ->join('users','users.id','=','orders.user_id')
     ->join('plans','plans.id','=','orders.plan_id')
     ->where('orders.id',$id)
     ->first();
     $data['products']=OrderDetails::where('order_id',$id)

     ->get();
   
     return view('admin.orders.invoice-homedelivery',compact('data','orders'));     
  }
}
