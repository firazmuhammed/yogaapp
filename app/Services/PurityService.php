<?php

namespace App\Services;

use App\Models\Products;
use DB;
class PurityService
{
   private $purity;
   private $category;
   private $collection_id;
    public function getPurity( $purity,$category =null,$collection_id =null)
    {
        $this->purity =  $purity;
        $this->category=$category;
        $this->collection_id = $collection_id;
//       print_r( $this->colors);
        $formattedPurity = [];
        if($collection_id){
            $puritys = Products::select('products.metal_id','metals.metal_name',DB::raw('COUNT(products.id) as products_count'))
//                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
                ->join('metals','metals.id','=','products.metal_id')
                ->join('collections','collections.id','=','products.collection')
                ->where('collections.id',$this->collection_id)
                ->groupBy('products.metal_id')
                ->get();
        }else{
         $puritys = Products::select('products.metal_id','metals.metal_name',DB::raw('COUNT(products.id) as products_count'))
                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
                ->join('metals','metals.id','=','products.metal_id')
                ->whereIn('products_to_categories.category_id',explode(',',$this->category))
                ->groupBy('products.metal_id')
                ->get();
        }
    //        $puritys = Products::select('products.metal_id','metals.metal_name',DB::raw('COUNT(products.id) as products_count'))
    //                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
    //                ->join('metals','metals.id','=','products.metal_id')
    //                ->where('products_to_categories.category_id',$this->category)
    //                ->groupBy('products.metal_id')
    //                ->get();
//        echo '<pre>';
//        print_r($puritys);
        foreach($puritys as $index => $name) {
            $formattedPurity[] = [
                'name' => $name->metal_name,
                'products_count' => $name->products_count,
                'metal_id' => $name->metal_id,
            ];
        }
//        print_r($formattedColor);
        return $formattedPurity;
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