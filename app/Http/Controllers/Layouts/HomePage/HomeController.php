<?php

namespace App\Http\Controllers\Layouts\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\homePage;
use App\Models\Post;
use App\Models\Product;
use App\Models\Setting;
use App\Models\UserSub;
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

    public function showPage(Page $page)
    {
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        $pages = Page::where('status', 'publish')->get();
        $settings = Setting::first()->toArray();

        return view('layouts.homepage.singlePage', compact('settings', 'page', 'pages', 'settings', 'categories'));
    }

    public function showPost(Post $post)
    {
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

        return view('layouts.homepage.singleCategory', compact('settings', 'posts', 'pages', 'subCat', 'settings', 'categories', 'catId'));
    }

    public function contactPage(Request $request)
    {
        $settings = Setting::first()->toArray();
        $pages = Page::where('status', 'publish')->get();
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        $posts = Post::latest()->take(2)->get();

        if ($request->method() == 'POST') {
//            dd($request->file('attachment'));

            $validated = $request->validate([
                'user_email' => 'required|email',
                'message' => 'required|min:10',
                'attachment' => 'sometimes|required_if:requestType,sick|mimes:csv,txt,xlx,xls,pdf',
                'phone_number' => 'required',
                'order_number' => 'required'
            ]);

            if ($validated)
            {
                $newMessage = new UserSub();

                if ($request->hasFile('attachment'))
                {
                    $file = $request->file('attachment');
                    $newName = time().'_'.$file->getClientOriginalName();
                    $request->file('attachment')->storeAs('images', $newName, 'public');

                    $newMessage->attachment = $newName;
                    $newMessage->user_email  = $request->user_email;
                    $newMessage->phone_number = $request->phone_number;
                    $newMessage->order_number = $request->order_number;
                    $newMessage->message = $request->message;

                    $newMessage->save();

                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                } else {
                    $newMessage->user_email  = $request->user_email;
                    $newMessage->phone_number = $request->phone_number;
                    $newMessage->order_number = $request->order_number;
                    $newMessage->message = $request->message;

                    $newMessage->save();
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');

                }
            }
            elseif ($validated->fails())
            {
                return back()->withErrors($validated->errors())->withInput();
            }

        }
        if ($request->method() == 'GET')
        {
            return view('layouts.homepage.contactUs', compact('posts', 'pages', 'settings', 'categories'));
        }

    }
}
