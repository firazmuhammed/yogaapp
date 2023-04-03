<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GiftCard;
use Cart;
use Auth;

class ShoppingCart extends Component
{
    public $test="moo";
    public $count = 10;
    public $gift_card;
    public $discount=1;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;
   
    public function store()
    {
        
      
       // return redirect()->route('cart');
    }
    public function increaseQuantity($rowId)
    { 
       $product=Cart::instance('cart')->get($rowId);
       $qty=$product->qty+1;
       Cart::update($rowId,$qty);
    }
    public function decreaseQuantity($rowId)
    {
      $product=Cart::instance('cart')->get($rowId);
       $qty=$product->qty-1;
       Cart::update($rowId,$qty);
    }
    public function destroy($rowId)
    {
       $product=Cart::instance('cart')->remove($rowId);
     
    }
    public function calculateDiscount()
    {
       if(session()->has('gift-card'))
       {
         $amount=(float) str_replace(',', '',Cart::instance('cart')->subtotal());
          $this->discount=session()->get('gift-card')['amount'];
          $this->subtotalAfterDiscount= $amount-$this->discount;
          $this->taxAfterDiscount=  ($this->subtotalAfterDiscount * config('cart.tax'))/100;
          $this->totalAfterDiscount= $this->subtotalAfterDiscount+  $this->taxAfterDiscount;
        
       }
    }
    public function applyGiftCard()
    {
       if($this->gift_card!=null)
       {
         $gift_card=GiftCard::where('r_email',Auth::user()->email)
         ->where('id',$this->gift_card)
         ->first();
         session()->put('gift-card',[
           'amount'=> $gift_card->card_amount,
            'card_id'=>$gift_card->id

         ]);

       }
       else{
          session()->flash('gift-card-error','please select gift card');
       }
     
    
    }

    public function removeGiftCard()
    {
      session()->forget('gift-card');
    }
    public function moveToWishList($rowId)
    {
      $product=Cart::instance('cart')->get($rowId);
      $wishlistItems=Cart::instance('wishlist')->content()->pluck('id');
        if(!$wishlistItems->contains( $product->id))
        {
           Cart::instance('wishlist')->add($product->id,$product->name,1,$product->price)->associate('App\Models\Products');
         
         }
       
       
      $product=Cart::instance('cart')->remove($rowId);
    }
    public function render()
    {
      if(session()->has('gift-card'))
      { 
         if(Cart::instance('cart')->subtotal() < session()->get('gift-card')['amount'] )
         {
             session()->forget('gift-card');
         }
         else{
            $this->calculateDiscount(); 
           
         }

      }
      if(Auth::check())
      {
         $gift_cards=GiftCard::where('r_email',Auth::user()->email)
         ->get();
      }
      else{
         $gift_cards=[];
      }
      if(Auth::check()) {
         Cart::instance('cart')->store(Auth::user()->email);
     }
        return view('livewire.shopping-cart',compact('gift_cards'))->extends('layouts.users')->section('content');
    }
}
