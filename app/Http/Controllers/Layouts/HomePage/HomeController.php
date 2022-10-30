<?php

namespace App\Http\Controllers\Layouts\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\homePage;
use App\Models\Post;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

use App\Models\Page;
class HomeController extends Controller
{

    public function index()
    {
        $settings = Setting::first()->toArray();
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        $pages = Page::where('status', 'publish')->get();
        $sectionsData = homePage::first();
        $products = Product::all();
        $posts = Post::latest()->take(2)->get();

        return view('layouts.homepage.homepage', compact('posts', 'products', 'pages', 'settings', 'categories', 'sectionsData'));
    }

    public function showPage(Page $slug)
    {
        $settings = Setting::first()->toArray();
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        $pages = Page::where('status', 'publish')->get();
        $settings = Setting::first()->toArray();

        return view('layouts.homepage.singlePage', compact('settings', 'slug', 'pages', 'settings', 'categories'));
    }

    public function showPost(Post $post)
    {
        $settings = Setting::first()->toArray();
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        $pages = Page::where('status', 'publish')->get();
        $settings = Setting::first()->toArray();

        return view('layouts.homepage.singlePost', compact('settings', 'post', 'pages', 'settings', 'categories'));

    }
    public function getSubCategories($id)
    {
        $settings = Setting::first()->toArray();
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        $catId = Category::find($id);
        $pages = Page::where('status', 'publish')->get();
        $subCat = $catId->subcategory;
        $posts = Post::latest()->take(2)->get();

        return view('layouts.homepage.singleCategory', compact('posts', 'pages', 'subCat', 'settings', 'categories', 'catId'));
    }
}
