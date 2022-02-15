<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function productsList()
    {
       
        $products = Product::all();
        return view('dashboard.pages.data', ['products' => $products]);
    }




    function list($id){
        $products = Product::where('category_id','=', $id)->get(); 
        return view('products.list',['products'=>$products,'category_id'=>$id]);
    }

    function create($id){
        return view('products.create',['categoryid'=>$id]);
    }

    public function store(StoreProductRequest $request,$id){

        $validated = $request->validated();

        $product=new Product();
       
        $product->updateOrInsert(['name' => $validated['name'],'description'=>$validated['description'],'slug'=>$validated['slug'],'category_id'=>$id,'available'=>1]);
        return redirect()->route('categories.products.list',$id);
    }

    function updateform($id){
        $product = product::find($id);
        return view('products.update',['product'=>$product]);
    }



    function update(StoreCategoryRequest $request,$id){

        $validated = $request->validated();
        $product=Product::find($id);
        $product->name=$validated['name'];
        $product->update();
        return redirect()->route('categories.products.list',$product->category_id);
    }



    public function delete($id){
        $product =product::findOrFail($id);

        // $category=Category::table('user')->where('userID', '=', $id);
        if ($product){
            $product->delete();
        }
        return redirect()->route('categories.products.list',$product->category_id);
    }

    
    public function show($id)
    {
        # code...
        $product = Product::find($id);
        $category= Category::find($product->category_id);
        return view('product.show',['product'=>$product,'category'=>$category]);
    }



}
