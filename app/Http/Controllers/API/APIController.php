<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactUs;
use App\Models\Products;
use App\Models\Plans;
use App\Models\TimeSlots;
use App\Models\Orders;
use Auth;
use DB;
use App\Models\Category;
use App\Models\User;
use App\Models\OrderDetails;
use App\Models\BulkProducts;
use App\Models\BulkOrder;
use App\Models\PostalCode;
use Stripe;
use App\Models\BulkOrderDetails;
use App\Models\HomeDeliveryProduct;
use Mail;
use App\Models\HomeDeliveryOrders;
use App\Models\HomeDeliveryOrderDetails;
use App\Jobs\SendEmailJob;
class APIController extends Controller
{
   public function getPlans()
   {

    $plans = Plans::all();
   
   
   $time_slot=TimeSlots::all();
   //  $time_slot = \DB::table('time_slots AS c')
   //  ->select(\DB::raw('c.*, (SELECT COUNT(t.id) FROM orders t WHERE t.time_slot=c.time_slot AND t.id>648) AS count'))
   //  ->groupBy('c.id')
   //  ->get();
   return  \Response::json(['data' => $plans,'time_slotes'=>$time_slot,'status'=>200]);
 
   }
   public function timeSlotCount(Request $request)
   {
    
      $count = \DB::table('time_slots AS c')
    ->select(\DB::raw('c.*, (SELECT 49-COUNT(t.id) FROM orders t WHERE t.time_slot=c.time_slot AND t.id>647 ) AS available'))
    ->groupBy('c.id')
    ->get();
    return  \Response::json(['time_slotes' => $count ,'status'=>200]);
   }
   public function getProducts($id)
   {

    $products = Products::where('plan_id',$id)
    ->get();
  
    $platinum_products = Products::where('plan_id',3)
    ->get();
   return  \Response::json(['data' => $products ,'platinum_products'=>$platinum_products,'status'=>200]);
   }

   public function orderProduct(Request $request)
   {
      $slotes= DB::select("select * from `orders` where `time_slot` = '$request->time_slot' AND orders.id>647");
     
      if( count($slotes)>=50)
      {
         return  \Response::json(['data' => [] ,'message'=>"time slot fully booked",'status'=>false]);    
      }
      else{
         $user = Auth::guard('api')->user();
         $lastorder=Orders::all()->last();
         $order_no=$lastorder->order_id;
         $order_no=(string)$order_no;
         $parts = explode( '-', $order_no );
       
         $user_id= $user['id'];
         $order=new Orders();
         $order->user_id=$user_id;
         $order->time_slot=$request->time_slot;
         if($parts[0]=="0")
         {
            $order_no=1;
         }
         else{
            $order_no=$parts [0]+1;
         }
         
         $order->order_id=  $order_no."-2022";
         $order->order_amount=$request->order_amount;
         $order->advance=$request->advance;
         $order->plan_id=$request->plan_id;
         $order->delivery_date=\Carbon\Carbon::parse($request->date)->format('Y-m-d');
         $order->payment_method=$request->payment_method;
         $order->eftpos=$request->eftpos;
         $order->address=$request->address;
         $order->order_type=$request->order_type;
         $order->post_code=$request->post_code;
         $deliveryCharge=0;
         if($request->order_type=="Home Delivery")
         {
            if($request->order_amount>800)
            {
               $deliveryCharge=0;
            }
            else{
               $deliveryCharge=20;
            }
         }
         $order->delivery_charge=$deliveryCharge;
         $order->save();
         foreach($request->orderitems as $item)
         {
            $product=Products::where('id',$item['id'])->first();
            $details=new OrderDetails();
            $details->order_id=$order->id;
            $details->product_id=$product->id;
            $details->qty=$item['quantity'];
            $details->product_name=$item['name'];
            $details->price=$item['price'];
            $details->save();
         }
         $info=Orders::select('orders.*','users.name','users.email','users.mobile','users.street','users.suburb','users.pincode')
         ->join('users','users.id','=','orders.user_id')
         //->join('plans','plans.id','=','orders.plan_id')
         ->where('orders.id', $order->id)
         ->first();
         $data['products']=OrderDetails::where('order_id',$order->id)
        ->get();
       $to_name =  $user['name'];
       $data=[
          "info"=>$info,
          'data'=> $data['products']
 
       ];
       $subject="Aptus-Order";
       
      
 $email = $user['email'];

//  $d=Mail::send('emails.xmas-order', $data, function($message) use ($email, $subject) {
//     $message->to($email)->subject($subject);
//  });
 dispatch(new SendEmailJob($data,$email));
          return  \Response::json(['data' => $order ,'status'=>true]);

      }
    
     
   }
   public function viewCardNumber(Request $request)
   {
      $data = Auth::guard('api')->user();
      $user_id=$data['id'];
      $card_number=User::where('id',$user_id)->select('privillage_card_no')->first();
      return  \Response::json(['data' =>  $card_number ,'status'=>true]);
   }
   public function getBulkProducts()
   {

       $products = BulkProducts::where('status',1)
      ->get();
       return  \Response::json(['data' => $products ,'status'=>200]);
   }
   public function bulkOrder(Request $request)
   {      
      if($request->pay_later==1){
         $method="Pay Later";
      }
      else{
         $method="Stripe";
      }
      $user= Auth::guard('api')->user();
    
      $user_id=$user['id'];
      $order=new BulkOrder();
      $order->user_id=$user_id;
      $order->order_id=random_int(100000, 999999);
      $order->order_amount=$request->order_amount;
      $order->mode_of_delivery=$request->mode_of_delivery;
      $order->address=$request->address;
      $order->transaction_id=$request->transaction_id;
      $order->abn_number=$request->abn_number;
      $order->company_name=$request->company_name;
      $order->payment_method=$method;
      $order->date_of_delivery=\Carbon\Carbon::parse($request->date)->format('Y-m-d');
      $order->save();
      foreach($request->orderitems as $item)
      {
         $details=new  BulkOrderDetails();
         $details->order_id=$order->id;
         $products = BulkProducts::where('id',$item['id'])->first();
         $avilable= $products->available_quantity;
         $details->product_name=$products->product_name;
         $details->product_id=$products->id;
         $details->price=$item['price'];
         $details->quantity=$item['quantity'];
         $details->save();
         $qty= $avilable-$item['quantity'];
         $item = BulkProducts::find($item['id']);
         $item->available_quantity= $qty;
         $item->save();
        
      }
      $info=BulkOrder::select('bulk_orders.*','users.name','users.email','users.mobile','users.state','users.pincode')
      ->join('users','users.id','=','bulk_orders.user_id')
      ->where('bulk_orders.id', $order->id)
      ->first();
      $data['products']=BulkOrderDetails::where('order_id', $order->id)
  
      ->get();
      $to_name =  $user['name'];
      $data=[
         "info"=>$info,
         'data'=> $data['products']

      ];
      $subject="Aptus-Order";
      
     
$email = $user['email'];
if($method=="Stripe")
{
   $d=Mail::send('emails.bulk-order-stripe', $data, function($message) use ($email, $subject) {
      $message->to($email)->subject($subject);
   });
}
else{
   $d=Mail::send('emails.eft', $data, function($message) use ($email, $subject) {
      $message->to($email)->subject($subject);
   });

}

      return  \Response::json(['data' => $order,'status'=>true]);
   }
   public function createIntent(Request $request)
   {
      Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      $stripe=  \Stripe\PaymentIntent::create([
         'amount' => $request->amount,
         'currency' => 'aud',
        //'payment_method_types' => ['card','ideal','klarna','p24','bancontact','acss_debit','sofort','eps'],
        'payment_method_types' => ['card'],
       ]);
       return  \Response::json(['data' => $stripe  ,'status'=>200]);
   }



   public function sendMail()
   {
      \Artisan::call('cache:clear');
      \Artisan::call('config:clear');
      \Artisan::call('config:cache');
      // $info=BulkOrder::select('bulk_orders.*','users.name','users.email','users.mobile')
      // ->join('users','users.id','=','bulk_orders.user_id')
      // ->where('bulk_orders.id',2)
      // ->first();
      // $data['products']=BulkOrderDetails::where('order_id',2)
  
      // ->get();
      $to_name = 'firaz';
      $data=[
         "info"=>"k",
         'data'=>"l"

      ];
      $subject="subject";

$email = 'muhammedfiraz19@gmail.com';
$details['email'] = 'muhammedfiraz19@gmail.com';
//dispatch(new SendEmailJob($details,$email ));
$d=Mail::send('emails.testmail', $data, function($message) use ($email, $subject) {
   $message->to($email)->subject($subject);
});
$d=1;
return  \Response::json(['data' => $d  ,'status'=>200]);

   }




   // home delivery 


   public function serachPostalCode(Request $request)
   {
      $code=PostalCode::select('code')->where('code','=',$request->code)->first();
    
      if($code)
      {
         return  \Response::json(['data' =>$code->code ,'message'=>"success",'status'=>true]);
      }
      else{
         return  \Response::json(['data' =>" ",'message'=>"service not available",'status'=>false]);
      }
   }

   public function getCategories()
   {
      $category=Category::where('status',1)->get();
      return  \Response::json(['data' =>$category,'status'=>true]);
     
   }

   public function getHomeDeliveryProducts($id)
   {
      $products=HomeDeliveryProduct::select('id','product_name','price','image','short_description')->where('status',1)->where('category_id','=',$id)->get();
      return  \Response::json(['data' =>$products,'status'=>true]);
     
   }
   public function getHomeDeliverySingle($id)
   {
      $products=HomeDeliveryProduct::select('id','product_name','price','unit','image','short_description','long_description')->where('status',1)->where('id','=',$id)->first();
      return  \Response::json(['data' =>$products,'status'=>true]);
     
   }

   public function HomeDeliveryOrder(Request $request)
   {      
     
      $user= Auth::guard('api')->user();
    
      $user_id=$user['id'];
      $order=new HomeDeliveryOrders();
      $order->user_id=$user_id;
      $order->order_id=random_int(100000, 999999);
      $order->order_amount=$request->order_amount;
      $order->delivery_charge=$request->delivery_charge;
      $order->address=$request->address;
      $order->transaction_id=$request->transaction_id;
      $order->date_of_delivery=\Carbon\Carbon::parse($request->delivery_date)->format('Y-m-d');
      $order->save();
      foreach($request->orderitems as $item)
      {
         $details=new  HomeDeliveryOrderDetails();
         $details->order_id=$order->id;
         $products = HomeDeliveryProduct::where('id',$item['id'])->first();
         $details->product_name=$products->product_name;
         $details->price=$item['price'];
         $details->quantity=$item['quantity'];
         $details->save();
         
        
      }
 

      return  \Response::json(['data' => $order,'status'=>true]);
   }
   
   // view password
   public function getPassword(Request $request)
   {
     
      $password=User::where('email',$request->email)->select('privillage_card_no')->first();
      if($password)
      {
         return  \Response::json(['data' =>$password,'status'=>true]);
      }
      else{
         return  \Response::json(['data' => [] ,'message'=>"no user found",'status'=>false]);    

      }
      
   }
   
}
