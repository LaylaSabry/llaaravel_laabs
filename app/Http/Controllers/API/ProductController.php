<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class productController extends Controller
{
    //
    public function list($id)
    {
        # code...
        $products = Product::where('category_id','=', $id)->get(); 
        return response()->json($products);
    }

    public function create($id)
    {
        # code...
        $categories = Category::all();
        return response()->json($categories);
    }

 
    public function store(StoreProductRequest $request,$id)
    {
        # code...
        $validated = $request->validated();
        $product = new Product();
        $product->updateOrInsert(['name' => $validated['name'],'description'=>$validated['description'],'slug'=>$validated['slug'],'category_id'=>$id,'available'=>1]);
        return response()->json($product,201);
    }

    public function delete($id)
    {
        # code...
        $product = Product::find($id);
        if($product){
            $product->delete();
            return response()->json("Deleted Successfully");
        }
        return response()->json("Not Found To Be Deleted");
    }

  

    public function updateform($id)
    {
        # code...
        $categories = Category::all();
        $product = Product::find($id);
        return response()->json([$id,$product,$categories]);
    }

  


    public function update( StoreProductRequest $request ,$id)
    {
        # code...
        $validated = $request->validated();
        $product = Product::find($id);
        $product->name=$validated['name'];
        $product->update();
        $products = Product::all();
        return response()->json(["updated successfully",$products]);
    }

 
    public function show($id)
    {
        # code...
        $product = Product::find($id);
        $categoryName= Category::find($product->category_id)->name;
        return response()->json([$product,$categoryName]);
    }

  


  

  



 


 

    

}
