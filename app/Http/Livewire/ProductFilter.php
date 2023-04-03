<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;
use Livewire\WithPagination;
use App\Services\PriceService;
use App\Services\ColorService;
use App\Models\Category;
use App\Services\GenderService;
use App\Services\PurityService;
use App\Services\MetalTypeService;
use App\Services\OccasionService;
use App\Services\WeightService;
use App\Services\DiamondWeightService;
use App\Services\CollectionService;
use App\Models\Collections;
use DB;
class ProductFilter extends Component {

    use WithPagination;
    public $filterpcount = "";
    public $price = "500";
    public $color = "";
    public $gender = "";
    public $purity = "";
    public $occasion = "";
    public $category;
    public $categoryname;
    public $metaltype = '';
    public $weight = '';
    public $diamondweight = '';
    public $collection = '';
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
        $this->category = $category;
    }

    public function render(PriceService $priceService, ColorService $colorservice, GenderService $genderservice, PurityService $purityservice, MetalTypeService $metalTypeService, OccasionService $occasionService, WeightService $weightService, DiamondWeightService $diamondWeightService, CollectionService $collectionService) {
        $categorries = Category::select(DB::raw('group_concat(categories.id) as ids'),'categories.name')
                ->where('categories.slug', 'like', '%' . $this->category . '%')
                ->first();
//        print_r($categorries->ids);exit(0);
        if($categorries->ids == null){
            $collectionss = Collections::select('collections.id','collections.collection_name')
                    ->where('collections.slug', 'like', '%' . $this->category . '%')
                    ->first();
            if($collectionss != null){
            $collection_id = $collectionss->id;
            $this->categoryname = $collectionss->collection_name;
            }else{
                $collection_id = '';
            }
            $category_id = '';
       
        }else{
//          foreach($categorries as $categorrie)  {
//              $category_id[]= $categorrie->id;
//          }
        $category_id = $categorries->ids;
        $collection_id = '';    
        $this->categoryname = $categorries->name;
        }
        if($this->category == 'jewellery'){
            $categorries = Category::select(DB::raw('group_concat(categories.id) as ids'))
                    ->where('status',1)->first();
            $category_id = $categorries->ids;
//            $this->categoryname = $categorries->name;
        }
//        if($collection_id == '' && $category_id == ''){
//            
//        }
//         print_r($categorries);exit(0);
        $prices = $priceService->getPrices([], $category_id,$collection_id);
//        print_r($prices);exit(0);
        $colors = $colorservice->getColors([], $category_id,$collection_id);
        $genders = $genderservice->getGender([], $category_id,$collection_id);
        $purites = $purityservice->getPurity([], $category_id,$collection_id);
        $metaltypes = $metalTypeService->getMetalType([], $category_id,$collection_id);
        $occasions = $occasionService->getOccasion([], $category_id,$collection_id);
        $weights = $weightService->getWeight([], $category_id,$collection_id);
        $diamondweights = '';
        if ($this->category == 'diamond'||$collection_id) {
            $diamondweights = $diamondWeightService->getDiamondWeight([], $category_id,$collection_id);
        }
        if($collection_id == null){
        $collections = $collectionService->getCollection([], $category_id,$collection_id);
        }else{
            $collections = "";
        }
//       print_r($colors);exit(0);
        // $products=Products::filter()->paginate(1);
        if ($this->category == 'diamond'||$collection_id) {
            if($collection_id){
                $products = Products::select('products.*')->where('collections.id',$collection_id)
                    ->join('collections','collections.id','=','products.collection')
                    ->leftJoin('diamonds_details', function($join) {
                        $join->on('diamonds_details.product_id', '=', 'products.id');
//                    $join->where('products_to_categories.category_id','=', 4);
                    })
                    ->where(function ($query) {
                        $query->withFilters(
                                $this->selected
                        );
                    })
                    ->get();
            }else{
            $products = Products::select('products.*')->whereIn('products_to_categories.category_id',explode(',',$category_id))
                    ->join('products_to_categories', 'products_to_categories.product_id', 'products.id')
                    ->leftJoin('diamonds_details', function($join) {
                        $join->on('diamonds_details.product_id', '=', 'products.id');
//                    $join->where('products_to_categories.category_id','=', 4);
                    })
                    ->where(function ($query) {
                        $query->withFilters(
                                $this->selected
                        );
                    })
                    ->get();
            }
        }else{
            if($collection_id){
            $products = Products::select('products.*')->where('collections.id',$collection_id)
                    ->join('collections','collections.id','=','products.collection')
                    ->where(function ($query) {
                        $query->withFilters(
                                $this->selected
                        );
                    })
                    ->get();
        }else {
            $products = Products::select('products.*')->whereIn('products_to_categories.category_id',explode(',',$category_id))
                    ->join('products_to_categories', 'products_to_categories.product_id', 'products.id')
                    ->where(function ($query) {
                        $query->withFilters(
                                $this->selected
                        );
                    })
                    ->get();
        }
        }
$this->filterpcount= count($products);
//print_r($products);exit(0);
        return view('livewire.product-filter', compact('prices', 'colors', 'genders', 'purites', 'metaltypes', 'occasions', 'weights', 'diamondweights', 'collections'));
    }

    public function updatedSelected() {

        $this->emit('updatedSidebar', $this->selected);
    }

    public function refresh() {
        $this->selected = $selected = [
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
        $this->emit('updatedSidebar', $this->selected);
    }

}
