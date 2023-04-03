<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\BulkProducts;
use Illuminate\Support\Str;

use DB;
use File;
use Image;
use Validator;
use App\Models\Plans;


class ProductController extends Controller
{
    /**
     * Author : Firaz
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Display product database.
     *
     * @author  <Firaz>
     * @return products
     */
    public function productDisplay()
    {
     
        $results['products'] = Products::join('plans','plans.id','products.plan_id')
                           ->select('products.*','plans.plan_name')
                                ->get();
                  
        return view('admin.products.index', compact('results'));
    }

    /**
     * Product add page with recursivecategories
     *
     * @author  <Firaz>
     * @return categories and subcategories
     */
    public function addDisplay(Request $request)
    {

        $result = array();
        $plans = Plans::all();
      
        return view('admin.products.add-product', compact('result','plans'));
    }
    public function insertProduct(Request $request)
    {
       $product=new Products();
       $product->product_name=$request->name;
       $product->price=$request->price;
       $product->plan_id=$request->plan;
       $product->save();
       return redirect()->back()->with('success', 'product added succesfully !');
    }
    public function editProductView($id)
    {
        $product =  Products::findOrFail($id);
        $plans = Plans::all();
        return view('admin.products.edit-product', compact('product','plans'));

    }

    public function updateProduct(Request $request)
    {
      
       $product = Products::findOrFail($request->id);
       $product->product_name=$request->name;
       $product->price=$request->price;
       $product->plan_id=$request->plan;
       $product->save();
       return redirect()->back()->with('success', 'product added succesfully !');
    }
    public function deleteProduct($id)
    {
      
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted Succesfully !');
    }
    public function bulkProductDisplay()
    {
     
        $results['products'] = BulkProducts::get();
                  
        return view('admin.products.list-bulk-products', compact('results'));
    }
    public function addBulkProductView()
    {
        return view('admin.products.add-bulk-products');
    }
    public function insertBulkProduct(Request $request)
    {
        $product=new BulkProducts();
        $product->product_name=$request->name;
        $product->unit_price=$request->unit_price;
        $product->unit=$request->unit;
        $product->available_quantity=$request->available_quantity;
        $product->save();
        return redirect()->back()->with('success', 'product added succesfully !');

    }
    
    public function deleteBulkProduct($id)
    {
        $product = BulkProducts::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'product deleted Succesfully !');

    } 
    public function editBulkProduct($id)
    {
        $product = BulkProducts::findOrFail($id);
        return view('admin.products.edit-bulk-products', compact('product'));

    }
    public function updateBulkProduct(Request $request)
    {
     
        $product = BulkProducts::findOrFail($request->id);
        $product->product_name=$request->name;
        $product->unit_price=$request->unit_price;
        $product->unit=$request->unit;
        $product->available_quantity=$request->available_quantity;
        $product->save();

        return redirect()->back()->with('success', 'product updated succesfully !');

    }
    
    
    
 
    

}
