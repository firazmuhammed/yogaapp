<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class ProductCompare extends Component
{
    public function render()
    {
        return view('livewire.product-compare')->extends('layouts.users')->section('content');
    }
    public function removeFromCompare($product_id)
    {  
      
        foreach(Cart::instance('compare')->content() as $item)
        {
          if($item->id==$product_id)
          {
            Cart::instance('compare')->remove($item->rowId);
          }
        }
       
    }
}
