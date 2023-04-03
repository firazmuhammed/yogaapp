<?php

namespace App\Services;

use App\Models\Products;

class WeightService
{
    private $weight;
    private $categories;
    private $manufacturers;
    private $category;
 private $collection_id;
    public function getWeight($weight,$category =null,$collection_id =null)
    {
        $this->weight = $weight;
        $this->category=$category;
       $this->collection_id = $collection_id;
       
        $formattedWeight = [];

        foreach(Products::WEIGHT as $index => $name) {
            $formattedWeight[] = [
                'name' => $name,
                'products_count' => $this->getProductCount($index)
            ];
        }

        return $formattedWeight;
    }

    private function getProductCount($index)
    {
        //dd( $this->category);
        if($this->collection_id){
            return Products::where('collections.id','=', $this->collection_id)
        ->join('collections','collections.id','=','products.collection')
        ->withFilters($this->weight)
            ->when($index == 0, function ($query) {
                $query->where('metal_net_weight', '<', 1);
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('metal_net_weight', [1, 3]);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('metal_net_weight', [3, 3]);
            })
            ->when($index == 3, function ($query) {
                $query->whereBetween('metal_net_weight', [5,7]);
            })
             ->when($index == 4, function ($query) {
                $query->whereBetween('metal_net_weight', [7,15]);
            })
            ->when($index == 5, function ($query) {
                $query->where('metal_net_weight', '>', 15);
            })
            ->count();
        }else{
        return Products::whereIn('products_to_categories.category_id',explode(',',$this->category))
        ->join('products_to_categories','products_to_categories.product_id','products.id')
        ->withFilters($this->weight)
            ->when($index == 0, function ($query) {
                $query->where('metal_net_weight', '<', 1);
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('metal_net_weight', [1, 3]);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('metal_net_weight', [3, 3]);
            })
            ->when($index == 3, function ($query) {
                $query->whereBetween('metal_net_weight', [5,7]);
            })
             ->when($index == 4, function ($query) {
                $query->whereBetween('metal_net_weight', [7,15]);
            })
            ->when($index == 5, function ($query) {
                $query->where('metal_net_weight', '>', 15);
            })
            ->count();
        }
    }
}