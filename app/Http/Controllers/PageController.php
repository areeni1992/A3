<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('backend.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image'))
        {
            $image  = Request::file('image');
            $fileName = 'page'.'-'.time().'.'.$image->getClientOriginalExtension();

            $newPage = Page::create(collect($validated)->except(['image'])->toArray());
            $newPage->image = $image->storeAs('images', $fileName, 'public');
            $newPage->save();

            return redirect()->back()->with('success', 'Post has been created successfully.');

        } else {
            Page::create($validated + ['slug' => Str::slug($request->slug)]);
            return redirect()->back()->with('success', 'Post has been created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exactPage = Page::find($id);

        return view('backend.page.edit', compact('exactPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePageRequest  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public static function update(UpdatePageRequest $request)
    {
        $exactPage = Page::find($request->id);
//        dd($exactPage);

        if ($request->hasFile('image'))
        {
            Storage::disk('public')->delete($exactPage->image);
            $image  = Request::file('image');
            $fileName = 'page'.'-'.time().'.'.$image->getClientOriginalExtension();

            $exactPage->update(collect($exactPage)->except(['image'])->toArray());
            $exactPage->image = $image->storeAs('images', $fileName, 'public');
            $exactPage->save();

            return redirect()->back()->with('success', 'Post has been created successfully.');
        } else {
            $exactPage->update($request->input());
            return redirect()->back()->with('success', 'Post has been created successfully.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exactPage = Page::find($id);
        $exactPage->delete();
        return redirect()->back()->with('success', 'Post has been Deleted successfully.');
    }
}
