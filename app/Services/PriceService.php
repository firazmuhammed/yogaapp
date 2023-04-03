<?php

namespace App\Services;

use App\Models\Products;

class PriceService
{
    private $prices;
    private $categories;
    private $manufacturers;
    private $category;
    private $collection_id;
    public function getPrices($prices,$category =null,$collection_id =null)
    {
        $this->prices = $prices;
        $this->category=$category;
       $this->collection_id = $collection_id;
//       print_r( $this->category);exit(0);
        $formattedPrices = [];

        foreach(Products::PRICES as $index => $name) {
            $formattedPrices[] = [
                'name' => $name,
                'products_count' => $this->getProductCount($index)
            ];
        }

        return $formattedPrices;
    }

    private function getProductCount($index)
    {
        //dd( $this->category);
        if($this->collection_id){
            return Products::where('collections.id','=', $this->collection_id)
        ->join('collections','collections.id','=','products.collection')
        ->withFilters($this->prices)
            ->when($index == 0, function ($query) {
                $query->where('metal_price', '<', '5000');
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('metal_price', ['5000', '10000']);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('metal_price', ['10000', '50000']);
            })
            ->when($index == 3, function ($query) {
                $query->where('metal_price', '>', '50000');
            })
            ->count();
        }else{
        return Products::whereIn('products_to_categories.category_id',explode(',',$this->category))
        ->join('products_to_categories','products_to_categories.product_id','products.id')
        ->withFilters($this->prices)
            ->when($index == 0, function ($query) {
                $query->where('metal_price', '<', '5000');
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('metal_price', ['5000', '10000']);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('metal_price', ['10000', '50000']);
            })
            ->when($index == 3, function ($query) {
                $query->where('metal_price', '>', '50000');
            })
            ->count();
    }
}
}
