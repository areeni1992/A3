<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\homePage;
use App\Http\Requests\StorehomePageRequest;
use App\Http\Requests\UpdatehomePageRequest;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', null)->get();

//        $subc = [];
//        foreach ($categories as $c)
//        {
//            foreach ($c->subcategory as $sub)
//            {
//                $subc += [$sub];
//            }
//        }
//        dd($subc);

        return view('backend.homepage.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorehomePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorehomePageRequest $request)
    {

        $data = $request->input();

        dd($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\homePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show(homePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\homePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit(homePage $homePage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatehomePageRequest  $request
     * @param  \App\Models\homePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatehomePageRequest $request, homePage $homePage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\homePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(homePage $homePage)
    {
        //
    }
}
