<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class Wishlist extends Component
{
    public function render()
    {
        return view('livewire.wishlist')->extends('layouts.users')->section('content');;
    }
    public function removeFromWishlist($product_id)
    {  
      
        foreach(Cart::instance('wishlist')->content() as $item)
        {
          if($item->id==$product_id)
          {
            Cart::instance('wishlist')->remove($item->rowId);
          }
        }
       
    }
    public function store($product_id,$product_name,$product_price,$weight,$optionId)
    {
        
 
        Cart::instance('cart')->add(['id'=>$product_id,'name'=>$product_name,'qty'=>1,'price'=>$product_price,'options' => [
            'weight' => $weight,'optionId'=>$optionId]
            ])->associate('App\Models\Products');

        session()->flash('success','Item added');
       // return redirect()->route('cart');
       $this->emitTo('cart-count-component','refreshComponent');
    }
}
