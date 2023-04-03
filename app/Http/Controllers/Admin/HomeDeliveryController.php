<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryDescription;
use App\Models\HomeDeliveryProduct;
use Illuminate\Support\Str;
class HomeDeliveryController extends Controller
{
    /**
     * * Author : Firaz
     * Display a listing of the category.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        
    
    }

    public function addcategory(Request $request)
    {
        $request->validate([
            'image' => 'dimensions:max_width=50,max_height=50|image|mimes:png,jpeg',
        ]);
           $category=new Category();
           $category->category_name=$request->name;
           $category->save();
           $image = $request->file('image');
           $filename = $image->getClientOriginalName();
           $filename = $category->id . '_' . $filename;
   
           //Fullsize
           $image->move(public_path() . '/images/category/', $filename);
           $category_image = Category::find(  $category->id);
           $category_image->category_image= $filename;
           $category_image->save();
           return redirect()->back()->with('success', 'category added succesfully !');
    }
    public function deleteCategory($id) {

        $category = Category::find($id);

        unlink(public_path().'/images/category/'.$category ->category_image);

        Category::where("id",$id)->delete();

        return back()->with("success", "Category deleted successfully.");

    }

    public function listCategory()
    {
        $category=Category::all();
     
        return view('admin.products.category',compact('category'));
    }
    public function addProduct(Request $request)
    {
        $request->validate([
            'image' => 'dimensions:max_width=200,max_height=200|image|mimes:png,jpeg',
        ]);
           $product=new HomeDeliveryProduct();
           $product->product_name=$request->name;
           $product->price=$request->price;
           $product->category_id=$request->category_id;
           $product->short_description=$request->short_description;
           $product->long_description=$request->long_description;
           $product->unit=$request->unit;
           $product->save();
           $image = $request->file('image');
           $filename = $image->getClientOriginalName();
           $filename =  $product->id . '_' . $filename;
   
           //Fullsize
           $image->move(public_path() . '/images/products/', $filename);
           $product_image = HomeDeliveryProduct::find($product->id);
           $product_image->image= $filename;
           $product_image->save();
           return redirect()->back()->with('success', 'product added succesfully !');
    }

    public function deleteProduct($id)
    {
        $product= HomeDeliveryProduct::find($id);

        unlink(public_path().'/images/products/'. $product->image);

        HomeDeliveryProduct::where("id",$id)->delete();

        return back()->with("success", "product deleted successfully.");
        
    }

    public function listProducts()
    {

        $data['products'] = HomeDeliveryProduct::join('categories','categories.id','home_delivery_products.category_id')
                              ->select('categories.*','home_delivery_products.*')
                             ->get();

        return view('admin.products.home-delivery',compact('data'));
    }
    public function editProductView($id)
    {
        $product = HomeDeliveryProduct::findOrFail($id);
     
        return view('admin.products.edit-home-delivery-product', compact('product'));

    }
  
    
}
