<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;
use App\Models\Category;
use Livewire\WithPagination;
use App\Services\PriceService;
use App\Services\ColorService;
use App\Services\GenderService;
use App\Services\PurityService;
use App\Services\MetalTypeService;
use App\Services\OccasionService;
use App\Services\WeightService;
use App\Services\DiamondWeightService;
use App\Services\CollectionService;
use App\Models\Collections;
use DB;
use Cart;

use Auth;



class ShopComponent extends Component {

    use WithPagination;

    public $filter;
    public $filters = [];
    public $perPage = 9;
    public $count = "";
    public $totalcount = "";
    public $pagecount = 1;
    public $category;
    public $category_id;
    public $price = 500;
    public $color = '';
    public $gender = "";
    public $purity = "";
    public $metaltype = '';
    public $occasion = "";
    public $weight = '';
    public $diamondweight = '';
    public $collection = '';
    /* Shop Component */
    protected $listeners = [
        'load-more' => 'loadMore',
        'updatedSidebar' => 'setSelected'
    ];
    public $selected = [
        'prices' => [],
        'colors' => [],
        'gender' => [],
        'purity' => [],
        'metaltype' => [],
        'occasion' => [],
        'weight' => [],
        'diamondweight' => [],
        'collection' => [],
    ];

    public function mount($category) {
        $this->filter = 'asc';
        $this->filters = [];
        $this->category = $category;
        $categorries = Category::select(DB::raw('group_concat(categories.id) as ids'))
                ->where('categories.slug', 'like', '%' . $this->category . '%')
                ->first();

        if ($categorries == null) {


            if ($categorries->ids == null) {

                $collectionss = Collections::select('collections.id')
                        ->where('slug', 'like', '%' . $this->category . '%')
                        ->first();
                $collection_id = $collectionss->id;
                $category_id = '';
            } else {
                $category_id = $categorries->ids;
                $collection_id = '';
            }
        }
        if ($this->category == 'jewellery') {
            $categorries = Category::select(DB::raw('group_concat(categories.id) as ids'))
                            ->where('status', 1)->first();
            $category_id = $categorries->ids;
        }
    }

    public function loadMore() {
        $this->perPage = $this->perPage + 9;
    }

    public function filter($val) {
        $this->filter = $val;
    }

    public function render(PriceService $priceService, ColorService $colorServices, GenderService $genderservice, PurityService $purityservice, MetalTypeService $metalTypeService, OccasionService $occasionService, WeightService $weightService, DiamondWeightService $diamondWeightService, CollectionService $collectionService) {

        $categorries = Category::select(DB::raw('group_concat(categories.id) as ids'))
                ->where('categories.slug', 'like', '%' . $this->category . '%')
                ->first();
        if ($categorries->ids == null) {
            $collectionss = Collections::select('collections.id')
                    ->where('slug', 'like', '%' . $this->category . '%')
                    ->first();
            if ($collectionss != null) {
                $collection_id = $collectionss->id;
            } else {
                $collection_id = '';
            }
            $category_id = '';
        } else {
            $category_id = $categorries->ids;
            $collection_id = '';
        }
        if ($this->category == 'jewellery') {
            $categorries = Category::select(DB::raw('group_concat(categories.id) as ids'))
                            ->where('status', 1)->first();
            $category_id = $categorries->ids;
        }
//    print_r($this->selected);
//    print_r($this->selected['colors']);
//    exit(0);
        // $products=Products::filter()->paginate(1);
        if ($this->category == 'diamond' || $collection_id) {
            if ($collection_id) {
                $products = Products::select('products.*')->where('collections.id', $collection_id)
                                ->join('collections', 'collections.id', '=', 'products.collection')
                                ->leftJoin('diamonds_details', function($join) {
                                    $join->on('diamonds_details.product_id', '=', 'products.id');
//                    $join->where('products_to_categories.category_id','=', 4);
                                })
                                ->where('products.product_status', 1)
                                ->where(function ($query) {
                                    $query->withFilters(
                                            $this->selected
                                    );
                                })->OrderBy('metal_price', $this->filter)->paginate($this->perPage);

                $productss = Products::select('products.*')->where('collections.id', $collection_id)
                                ->join('collections', 'collections.id', '=', 'products.collection')
                                ->leftJoin('diamonds_details', function($join) {
                                    $join->on('diamonds_details.product_id', '=', 'products.id');
                                })
                                ->where('products.product_status', 1)
                                ->where(function ($query) {
                                    $query->withFilters(
                                            $this->selected
                                    );
                                })->OrderBy('metal_price', $this->filter)->count();
                $productss = Products::select('products.*')->where('collections.id', $collection_id)
                                ->join('collections', 'collections.id', '=', 'products.collection')
                                ->leftJoin('diamonds_details', function($join) {
                                    $join->on('diamonds_details.product_id', '=', 'products.id');
                                })
                                ->where('products.product_status', 1)
                                ->where(function ($query) {
                                    $query->withFilters(
                                            $this->selected
                                    );
                                })->OrderBy('metal_price', $this->filter)->count();
            } else {
                $products = Products::select('products.*')->whereIn('products_to_categories.category_id', explode(',', $category_id))
                                ->join('products_to_categories', 'products_to_categories.product_id', 'products.id')
                                ->leftJoin('diamonds_details', function($join) {
                                    $join->on('diamonds_details.product_id', '=', 'products.id');
                                })
                                ->where('products.product_status', 1)
                                ->where(function ($query) {
                                    $query->withFilters(
                                            $this->selected
                                    );
                                })->OrderBy('metal_price', $this->filter)->paginate($this->perPage);

                $productss = Products::select('products.*')->whereIn('products_to_categories.category_id', explode(',', $category_id))
                                ->join('products_to_categories', 'products_to_categories.product_id', 'products.id')
                                ->leftJoin('diamonds_details', function($join) {
                                    $join->on('diamonds_details.product_id', '=', 'products.id');
                                })
                                ->where('products.product_status', 1)
                                ->where(function ($query) {
                                    $query->withFilters(
                                            $this->selected
                                    );
                                })->OrderBy('metal_price', $this->filter)->count();
            }
        } else {
            if ($collection_id) {
                $products = Products::select('products.*')->where('collections.id', $collection_id)
                                ->join('collections', 'collections.id', '=', 'products.collection')
                                ->where('products.product_status', 1)
                                ->where(function ($query) {
                                    $query->withFilters(
                                            $this->selected
                                    );
                                })->OrderBy('metal_price', $this->filter)->paginate($this->perPage);
                $productss = Products::select('products.*')->where('collections.id', $collection_id)
                                ->join('collections', 'collections.id', '=', 'products.collection')
                                ->where('products.product_status', 1)
                                ->where(function ($query) {
                                    $query->withFilters(
                                            $this->selected
                                    );
                                })->OrderBy('metal_price', $this->filter)->count();
            } else {
                $products = Products::select('products.*')->whereIn('products_to_categories.category_id', explode(',', $category_id))
                                ->join('products_to_categories', 'products_to_categories.product_id', 'products.id')
                                ->where('products.product_status', 1)
                                ->where(function ($query) {
                                    $query->withFilters(
                                            $this->selected
                                    );
                                })->OrderBy('metal_price', $this->filter)->paginate($this->perPage);
                $productss = Products::select('products.*')->whereIn('products_to_categories.category_id', explode(',', $category_id))
                                ->join('products_to_categories', 'products_to_categories.product_id', 'products.id')
                                ->where('products.product_status', 1)
                                ->where(function ($query) {
                                    $query->withFilters(
                                            $this->selected
                                    );
                                })->OrderBy('metal_price', $this->filter)->count();
            }
        }

        //  dd($products);
////        echo '<pre>';
//      print_r($products);//exit(0);
        /* $products=Products::OrderBy('metal_price',$this->filter)
          ->join('products_to_categories','products.id','=','products_to_categories.product_id')
          ->join('categories','products_to_categories.category_id','=','categories.id')
          ->where('categories.name', 'like', '%'.$this->category.'%')
          ->where('products.metal_price', '=',$this->price)

          ->limit($this->perPage)->get(); */
        $this->totalcount = $productss;
//                ->count();

        $this->count= count($products);
        if(Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
        }

        $this->count = count($products);

        return view('livewire.shop-component', compact('products', 'category_id'))->extends('layouts.users')->section('content');
    }

//    public function levelClicked($val)
//{
//     $this->price=$val;
//   
//}
//   public function colorClicked($val)
//{
//     $this->color=$val;
//   
//}

    public function setSelected($selected) {

        $this->selected = $selected;
//    print_r($this->selected);
    }

    public function addtoCompare($product_id, $product_name, $product_price) {
        $count = Cart::instance('compare')->count();
        $compareItems = Cart::instance('compare')->content()->pluck('id');
        if (!$compareItems->contains($product_id)) {
            if ($count < 5) {
                Cart::instance('compare')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Products');
            }
        }
    }

    public function store($product_id, $product_name, $product_price, $weight, $optionId) {

        
        Cart::instance('cart')->add(['id' => $product_id, 'name' => $product_name, 'qty' => 1, 'price' => $product_price, 'options' => [
                'weight' => $weight, 'optionId' => $optionId]
        ])->associate('App\Models\Products');

        session()->flash('success', 'Item added');
        // return redirect()->route('cart');
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function addtoWishList($product_id, $product_name, $product_price) {

        $wishlistItems = Cart::instance('wishlist')->content()->pluck('id');
        if (!$wishlistItems->contains($product_id)) {
            Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Products');
        }
    }

}
