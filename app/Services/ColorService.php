<?php

namespace App\Services;

use App\Models\Products;
use DB;
class ColorService
{
   private $colors;
   private $category;
   private $collection_id;
    public function getColors($colors,$category =null,$collection_id =null)
    {
        $this->colors =  $colors;
        $this->category=$category;
        $this->collection_id = $collection_id;
//       print_r( $this->collection_id);
        $formattedColor = [];
        if($collection_id){
            $colors = Products::select('metal_color',DB::raw('COUNT(products.id) as products_count'))
//                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
                ->join('collections','collections.id','=','products.collection')
                ->where('collections.id',$this->collection_id)
                ->groupBy('products.metal_color')
                ->get();
        }else{
         $colors = Products::select('metal_color',DB::raw('COUNT(products.id) as products_count'))
                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
                ->whereIn('products_to_categories.category_id',explode(',',$this->category))
                ->groupBy('products.metal_color')
                ->get();
        }
        foreach($colors as $index => $name) {
            $formattedColor[] = [
                'name' => $name->metal_color,
                'products_count' => $name->products_count
            ];
        }
//        print_r($formattedColor);
        return $formattedColor;
    }

//    private function getProductCount($index)
//    {
////        print_r($index);
//        return Products::where('products_to_categories.category_id','=', $this->category)
//        ->join('products_to_categories','products_to_categories.product_id','products.id')
//        ->withFilters($this->colors)
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