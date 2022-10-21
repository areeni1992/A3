<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', null)->get();


        return view('backend.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();



        if ($request->hasFile('image'))
        {
            $image  = Request::file('image');
            $fileName = 'product'.'-'.time().'.'.$image->getClientOriginalExtension();

            $newProd = Product::create(collect($validated)->except(['image', 'price'])->toArray());
            $newProd->image = $image->storeAs('images', $fileName, 'public');
            $newProd->price = $request->price;
            $newProd->save();

            return redirect()->back()->with('success', 'Post has been created successfully.');
        } else {
            Product::create($validated + [
                    Product::create($request->price)
                ]);
            return redirect()->back()->with('success', 'Post has been created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::where('parent_id', null)->get();
        return view('backend.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $exactProduct = Product::find($request->id);
//        dd($exactPage);

        if ($request->hasFile('image'))
        {
            Storage::disk('public')->delete($exactProduct->image);
            $image  = Request::file('image');
            $fileName = 'page'.'-'.time().'.'.$image->getClientOriginalExtension();

            $exactProduct->update(collect($request->validated())->except(['image'])->toArray());
            $exactProduct->image = $image->storeAs('images', $fileName, 'public');
            $exactProduct->save();

            return redirect()->back()->with('success', 'Post has been created successfully.');
        } else {
            $exactProduct->update($request->input());
            return redirect()->back()->with('success', 'Post has been created successfully.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exactProduct = Product::find($id);
        $exactProduct->delete();
        return redirect()->back()->with('success', 'Product has been Deleted successfully.');
    }
}
