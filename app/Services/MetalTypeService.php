<?php

namespace App\Services;

use App\Models\Products;
use DB;
class MetalTypeService
{
   private $metaltype;
   private $category;
   private $collection_id;
    public function getMetalType( $metaltype,$category =null,$collection_id =null)
    {
        $this->metaltype =  $metaltype;
        $this->category=$category;
        $this->collection_id = $collection_id;
//       print_r( $this->colors);
        $formattedMetalType = [];
        if($collection_id){
            $metaltypes = Products::select('metal_type',DB::raw('COUNT(products.id) as products_count'))
//                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
                ->join('collections','collections.id','=','products.collection')
                ->where('collections.id',$this->collection_id)
                ->groupBy('products.metal_type')
                ->get();
        }else{
         $metaltypes = Products::select('metal_type',DB::raw('COUNT(products.id) as products_count'))
                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
                ->whereIn('products_to_categories.category_id',explode(',',$this->category))
                ->groupBy('products.metal_type')
                ->get();
        }
//        $metaltypes = Products::select('metal_type',DB::raw('COUNT(products.id) as products_count'))
//                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
//                ->where('products_to_categories.category_id',$this->category)
//                ->groupBy('products.metal_type')
//                ->get();
//        print_r($genders);
        foreach($metaltypes as $index => $name) {
            $formattedMetalType[] = [
                'name' => $name->metal_type,
                'products_count' => $name->products_count
            ];
        }
//        print_r($formattedColor);
        return $formattedMetalType;
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