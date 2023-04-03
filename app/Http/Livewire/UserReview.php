<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrdersProducts;
use App\Models\UserReviews;
use Auth;


class UserReview extends Component
{
    public $item;
    public $rating;
    public $comment;
    public $product;
    public function mount($id)
    {
        $this->item = $id;
        $product = OrdersProducts::find($this->item);
        $this->product=$product->product_id;
    }
 public function updated($fields)
 {
    $this->validateOnly($fields,[
        'rating'=>'required',
        'comment'=>'required'
    ]

    );
 }
    public function addReview()
    {
       $this->validate([
            'rating'=>'required',
            'comment'=>'required'
       ]);
       $review=new UserReviews();
       $review->rating=$this->rating;
       $review->comment=$this->comment;
       $review->user_id=Auth::user()->id;
       $review->product_id=$this->product;
       $review->save();
       $status=OrdersProducts::find($this->item);
       $status->review_status=1;
       $status->save();
       session()->flash('message','rating added succesfully');
    }
    public function render()
    {
       
        $data['product']=OrdersProducts::select('orders_products.*','products.image','products.metal_gross_weight as weight')
        ->join('products','products.id','orders_products.product_id')
        ->where('orders_products.id',$this->item)
        ->first();
        return view('livewire.user-review',compact('data'))->extends('layouts.users')->section('content');
    }
}
