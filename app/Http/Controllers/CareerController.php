<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\homePage;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class CareerController extends Controller
{

    public function index()
    {
        $settings = Setting::first()->toArray();
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        $pages = Page::where('status', 'publish')->get();
        $sectionsData = homePage::first();
        $products = Product::all();
        $posts = Post::latest()->take(2)->get();
        return view('layouts.homePage.career', compact('posts', 'products', 'pages', 'settings', 'categories', 'sectionsData'));
    }
}
