<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductProperty extends Component
{
    public $contacts, $name, $phone, $contact_id,$weight_in_ct,$stone_price,$oldproperties;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;
    public $result;
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }
       public function mount($result = null)
    {
//          echo '<pre>';
//          print_r($result);
          if($result){
        $this->stone_price = $result->stone_price;
        $this->weight_in_ct = $result->weight_in_ct;
        $this->oldproperties = $result->properties;
        $this->i = count($result->properties);
//        foreach($result->properties as $key=>$oldproperties){
//            $this->i = $key;    
//        };
          }
    }
    public function render()
    {
        return view('livewire.product-property');
    }
}
