<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CheckOut extends Component
{


    public function mount()
    {
        if(!Cart::instance('cart')->count()>0)
        {
            return redirect()->route('home');
        }
       
    }

    public function destroy($rowId)
    {
       $product=Cart::instance('cart')->remove($rowId);
     
    }
    public function render()
    {
        return view('livewire.check-out')->extends('layouts.users')->section('content');
    }
}
