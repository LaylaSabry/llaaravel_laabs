<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function list(){

$categories=  Category::all(); 
return View('category.list',['categories'=>$categories]);
 
    }

    public function create(){
        return view('category.create');
    }


public function delete($id){
    $category =Category::findOrFail($id);
    if ($category){
        $category->delete();
    }
    return redirect()->route('categories.list');
}

function updateform($id){
    $category = Category::find($id);
    return view('category.update',['category'=>$category]);
}

function update(StoreCategoryRequest $request,$id){

    $validated = $request->validated();
    $category=Category::find($id);
    $category->name=$validated['name'];
    $category->update();
    return redirect()->route('categories.list');
}
public function store(StoreCategoryRequest $request){

    $category= new Category;
    $validated = $request->validated();
    $category->name=$validated['name'];
    $category->save(); 
    return redirect()->route('categories.list');
}


}
