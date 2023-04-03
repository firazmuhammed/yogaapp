<?php

namespace App\Services;

use App\Models\Products;
use DB;
class OccasionService
{
   private $occasion;
   private $category;
   private $collection_id;
    public function getOccasion( $occasion,$category =null,$collection_id =null)
    {
        $this->occasion =  $occasion;
        $this->category=$category;
        $this->collection_id = $collection_id;
//       print_r( $this->colors);
        $formattedOccasion = [];
        if($collection_id){
            $occasions = Products::select('occasion',DB::raw('COUNT(products.id) as products_count'))
//                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
                ->join('collections','collections.id','=','products.collection')
                ->where('collections.id',$this->collection_id)
                ->groupBy('products.occasion')
                ->get();
        }else{
         $occasions = Products::select('occasion',DB::raw('COUNT(products.id) as products_count'))
                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
                ->whereIn('products_to_categories.category_id',explode(',',$this->category))
                ->groupBy('products.occasion')
                ->get();
        }
//        $occasions = Products::select('occasion',DB::raw('COUNT(products.id) as products_count'))
//                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
//                ->where('products_to_categories.category_id',$this->category)
//                ->groupBy('products.occasion')
//                ->get();
//        print_r($genders);
        foreach($occasions as $index => $name) {
            $formattedOccasion[] = [
                'name' => $name->occasion,
                'products_count' => $name->products_count
            ];
        }
//        print_r($formattedColor);
        return $formattedOccasion;
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