<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        return view('backend.index');
    }

    public function categories()
    {
        $cats = Category::all();

        return view('backend.category.index', compact('cats'));
    }

    public function createCategory(Request $request)
    {
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        if($request->method() =='GET')
        {
            return view('backend.category.create', compact('categories'));
        }
        if($request->method() =='POST')
        {
            $validator = $request->validate([
                'name'      => 'required',
                'slug'      => 'required|unique:categories',
                'parent_id' => 'nullable|numeric'
            ]);

            Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'parent_id' =>$request->parent_id
            ]);

            return redirect()->back()->with('success', 'Category has been created successfully.');
        }
    }

    public function editCategory($id)
    {
        $cats = Category::find($id);
        $parentCats = Category::all();

        return view('backend.category.edit', compact('cats', 'parentCats'));
    }
    public function updateCategory(Request $request, $id)
    {

        $validatedData = $this->validate($request, [
            'name'  => 'required|min:3|max:255|string',
            'slug' => 'required|unique:categories'
        ]);

        $category = Category::find($id);
        $category->update($validatedData);

        return redirect()->route('categories')->withSuccess('You have successfully updated a Category!');
    }


    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        if ($category->parent_id == null)
        {
            $category->subcategory()->delete();

            $category->delete();
        }
        if ($category->parent_id !== null)
        {
            $category->delete();
        }

        return redirect()->back()->with('success', 'Category has been deleted successfully.');
    }

}
