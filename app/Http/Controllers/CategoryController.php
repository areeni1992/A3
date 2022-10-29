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

            $data = [
                'parent_id' => 'nullable|numeric'
            ];
            foreach (config('translatable.locales') as $lang )
            {
                $data[$lang.'*.name'] = 'required|string';
                $data[$lang.'*.slug'] = 'string';
            }

            $validator = $request->validate($data);
//            dd($validator);
            Category::create($validator);

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

        $data = [];
        foreach (config('translatable.locales') as $lang )
        {
            $data[$lang.'*.name'] = 'required|string';
            $data[$lang.'*.slug'] = 'string';
        }

        $validator = $request->validate($data);

        $category = Category::find($id);
        $category->update($validator);

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
