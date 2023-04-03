<?php

namespace App\Services;

use App\Models\Products;
use DB;
class CollectionService
{
   private $collection;
   private $category;
   private $collection_id;
    public function getCollection( $collection,$category =null,$collection_id =null)
    {
        $this->collection =  $collection;
        $this->category=$category;
        $this->collection_id = $collection_id;
//       print_r( $collection_id);
        $formattedCollection = [];
        if($collection_id){
            $collections = Products::select('products.collection','collections.collection_name',DB::raw('COUNT(products.id) as products_count'))
//                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
                ->join('collections','collections.id','=','products.collection')
                ->where('collections.id',$this->collection_id)
                ->groupBy('products.collection')
                ->get();
        }else{
        $collections = Products::select('products.collection','collections.collection_name',DB::raw('COUNT(products.id) as products_count'))
                ->join('products_to_categories','products_to_categories.product_id','=','products.id')
                ->join('collections','collections.id','=','products.collection')
                ->whereIn('products_to_categories.category_id',explode(',',$this->category))
                ->groupBy('products.collection')
                ->get();
        }
//        print_r($collections);
        foreach($collections as $index => $name) {
            $formattedCollection[] = [
                'name' => $name->collection_name,
                'products_count' => $name->products_count,
                'collection_id' => $name->collection,
            ];
        }
//        print_r($formattedColor);
        return $formattedCollection;
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