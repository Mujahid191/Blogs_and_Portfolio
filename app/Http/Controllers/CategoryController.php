<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // All Categories Method
    public function allCategories() {
        $categories = category::latest()->get();
        return view('admin.allCategories', compact('categories'));
    }

    // Save New Category Method
    public function newCategory(categoryRequest $request) {
        $category = category::create([
            'category_name' => $request->category_name,
        ]);
        if($category){
            return redirect()->route('allCategories');
        }
    }

    // Edit Category Method
    public function editCategory($id) {
        $category = category::find($id);
        return view('admin.editCategory', compact('category'));
    }

    // Update Category Method
    public function updateCategory(categoryRequest $request) {
        $category = category::find($request->id)->update([
            'category_name' => $request->category_name,
        ]);
        if($category) {
            return redirect()->route('allCategories');
        }
    }

    // Delete Category Method
    public function deleteCategory($id) {
        $category = category::find($id)->delete();
        if($category){
            return redirect()->back();
        };
    }
}
