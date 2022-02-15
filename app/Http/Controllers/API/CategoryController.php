<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


  function list()
    {
        # code...
        $categories = Category::all();
        return response()->json($categories);
    }
  

  function  store(StoreCategoryRequest $request)
    {
        # code...
        $validated = $request->validated();
        $category = new Category();
        $category->name=$validated['name'];
        $category->save();
        return response()->json($category,201);
    }


  function delete($id){
        $category =Category::findOrFail($id);
        if ($category){
            $category->delete();
            return response()->json("Deleted Fuccessfully");
        }
        return response()->json("Not Found To Be Deleted");
    }   


    function updateform($id){
        $category = Category::find($id);
        return response()->json([$id,$category]);  
    }
    

    function update( StoreCategoryRequest $request,$id)
    {
        # code...
        $validated = $request->validated();
        
        $category = Category::find($id);
        $category->name=$validated['name'];
        $category->update();
        return response()->json(["updated successfully",$category]);
    }
 function show($id)
    {
        # code...
        $category = Category::find($id);
        $products= Product::all()->where('category_id','=',$id);
        return response()->json([$category,$products]);
    }




   
        
        
      
        
       
}
