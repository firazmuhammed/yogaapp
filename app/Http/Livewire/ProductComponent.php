<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;
use App\Models\ProductAttributes;
use Livewire\WithPagination;
use Cart;
use DB;

class ProductComponent extends Component
{
    public $slug;
    public $count = 10;
    public $message="";
    public $pincode="";
    public $weight = '';
    public $optionId =0;

    public function increment()
    {
        $this->count++;
    }
    public function mount($slug)
    {
        $this->slug = $slug;
        $product = Products::findBySlug($this->slug);
        $weights=$product->metal_gross_weight;
      $this->weight=  $weights;
       
    }
    public function store($product_id,$product_name,$product_price,$weight,$size)
    {
        
 
        Cart::instance('cart')->add(['id'=>$product_id,'name'=>$product_name,'qty'=>1,'price'=>$product_price,'options' => [
            'weight' => $weight,'size'=>$size]
            ])->associate('App\Models\Products');

        session()->flash('success','Item added');
        return redirect()->route('cart');
    }
    public function changeSize($value)
    {
     
        $attribute=ProductAttributes::find($value);
        $this->weight =$attribute->weight_in_gram;
        $option=DB::table('product_option_values')->where('id', '=',  $attribute->options_values_id)->first();
        $this->optionId=$option->option_value_name;
        
    }
    public function render()
    {
        
        $product = Products::findBySlug($this->slug);
        $weights=$product->metal_gross_weight;

        return view('livewire.product-component',['product'=>$product])->extends('layouts.users')->section('content');
    }
    public function deliveryCheck()
    {
        $this->message="Delivery within 15 - 20 days";
    }
    public function addtoCompare($product_id,$product_name,$product_price)
    {
        $count=Cart::instance('compare')->count();
        $compareItems=Cart::instance('compare')->content()->pluck('id');
        if(!$compareItems->contains($product_id))
        {
            if($count<5){
                Cart::instance('compare')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Products');
            }
             
        }
       
       
       
    }
   
}
