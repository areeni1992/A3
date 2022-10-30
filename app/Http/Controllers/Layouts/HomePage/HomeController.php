<?php

namespace App\Http\Controllers\Layouts\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

use App\Models\Page;
class HomeController extends Controller
{

    public function index()
    {
        $settings = Setting::all();
        $pages = Page::all();
        return view('layouts.homepage.homepage', compact('pages', 'settings'));
    }

    public function showPage(Page $slug)
    {
        $pages = Page::all();
        return view('layouts.homepage.singlePage', compact('slug', 'pages'));
    }
}
