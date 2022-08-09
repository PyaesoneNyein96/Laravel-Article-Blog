<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function add() {
        $addCategorytoHomefeedCreate = Category::all();
        return view('home.add',[
            'addCategories' => $addCategorytoHomefeedCreate,
        ]);
    }

    // public function createCategory() {
    //     $category = new Category;
    //     $category->category = request()->category;
    //     $category->name = request()->name;
    //     $category->save();
    //     return back();

    // }

    // public function deleteCategory($id) {
    //     $deleteCategory = Category::find($id);
    //     $deleteCategory->delete();
    //     return back();
    // }
}
