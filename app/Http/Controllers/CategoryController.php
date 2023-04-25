<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $req){
        Category::create($req->all());
        return redirect()->back();
    }
    public function editCategory(Category $category,Request $req){
        $category->update($req->all());
        return redirect()->back();
    }
    public function deleteCategory(Category $category){
        $category->delete();
        return redirect()->back();
    }
}
