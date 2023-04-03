<?php

namespace App\Services;

use App\Models\Products;

class DiamondWeightService
{
    private $diamondweight;
    private $categories;
    private $manufacturers;
    private $category;
    private $collection_id;
    public function getDiamondWeight($diamondweight,$category =null,$collection_id =null)
    {
        $this->diamondweight = $diamondweight;
        $this->category=$category;
       $this->collection_id = $collection_id;
       
        $formattedDiamondWeight = [];

        foreach(Products::DIAMONDWEIGHT as $index => $name) {
            $formattedDiamondWeight[] = [
                'name' => $name,
                'products_count' => $this->getProductCount($index)
            ];
        }

        return $formattedDiamondWeight;
    }

    private function getProductCount($index)
    {
        //dd( $this->category);
        if($this->collection_id){
            return Products::where('collections.id','=', $this->collection_id)
        ->join('collections','collections.id','=','products.collection')
        ->join('diamonds_details','diamonds_details.product_id','=','products.id')
        ->withFilters($this->diamondweight)
            ->when($index == 0, function ($query) {
                $query->where('diamonds_details.weight_in_ct', '<', 0.10);
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('diamonds_details.weight_in_ct', [0.10, 0.25]);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('diamonds_details.weight_in_ct', [0.25, 0.50]);
            })
            ->when($index == 3, function ($query) {
                $query->whereBetween('diamonds_details.weight_in_ct', [0.50,1]);
            })
             ->when($index == 4, function ($query) {
                $query->whereBetween('diamonds_details.weight_in_ct', [1,1.50]);
            })
            ->when($index == 5, function ($query) {
                $query->whereBetween('diamonds_details.weight_in_ct', [1.50,2]);
            })
            ->when($index == 6, function ($query) {
                $query->whereBetween('diamonds_details.weight_in_ct', [2,5]);
            })
            ->when($index == 7, function ($query) {
                $query->where('diamonds_details.weight_in_ct', '>', 5);
            })
            ->count();
        }else{
        return Products::whereIn('products_to_categories.category_id',explode(',',$this->category))
        ->join('products_to_categories','products_to_categories.product_id','products.id')
        ->join('diamonds_details','diamonds_details.product_id','=','products.id')
        ->withFilters($this->diamondweight)
            ->when($index == 0, function ($query) {
                $query->where('diamonds_details.weight_in_ct', '<', 0.10);
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('diamonds_details.weight_in_ct', [0.10, 0.25]);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('diamonds_details.weight_in_ct', [0.25, 0.50]);
            })
            ->when($index == 3, function ($query) {
                $query->whereBetween('diamonds_details.weight_in_ct', [0.50,1]);
            })
             ->when($index == 4, function ($query) {
                $query->whereBetween('diamonds_details.weight_in_ct', [1,1.50]);
            })
            ->when($index == 5, function ($query) {
                $query->whereBetween('diamonds_details.weight_in_ct', [1.50,2]);
            })
            ->when($index == 6, function ($query) {
                $query->whereBetween('diamonds_details.weight_in_ct', [2,5]);
            })
            ->when($index == 7, function ($query) {
                $query->where('diamonds_details.weight_in_ct', '>', 5);
            })
            ->count();
        }
    }
}