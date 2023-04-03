<?php

namespace App\Services;

use App\Models\Products;
use DB;
class GenderService
{
   private $gender;
   private $category;
   private $collection_id;
    public function getGender( $gender,$category =null,$collection_id =null)
    {
        $this->gender =  $gender;
        $this->category=$category;
        $this->collection_id = $collection_id;
//       print_r( $this->colors);
        $formattedGender = [];
         if($collection_id){
            $genders = Products::select('gender',DB::raw('COUNT(products.id) as products_count'))
//                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
                ->join('collections','collections.id','=','products.collection')
                ->where('collections.id',$this->collection_id)
                ->groupBy('products.gender')
                ->get();
        }else{
         $genders = Products::select('gender',DB::raw('COUNT(products.id) as products_count'))
                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
                ->whereIn('products_to_categories.category_id',explode(',',$this->category))
                ->groupBy('products.gender')
                ->get();
        }
//        print_r($genders);
        foreach($genders as $index => $name) {
            $formattedGender[] = [
                'name' => $name->gender,
                'products_count' => $name->products_count
            ];
        }
//        print_r($formattedColor);
        return $formattedGender;
    }

//    private function getProductCount($index)
//    {
////        print_r($index);
////        return
//        $query = Products::where('products_to_categories.category_id','=', $this->category)
//        ->join('products_to_categories','products_to_categories.product_id','products.id')
//        ->withFilters($this->gender)
//            ->when($index == 0, function ($query) {
//                $query->where('metal_color', '=', 'white');
//            })
//            ->when($index == 1, function ($query) {
//                $query->where('metal_color','=','rose');
//            })->when($index == 2, function ($query) {
//                $query->where('metal_color','=','yellow');
//            })
//         
//            ->count();
//    }
}