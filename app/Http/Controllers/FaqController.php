<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\homePage;
use App\Models\Page;
use App\Models\Policy;
use App\Models\Post;
use App\Models\Product;
use App\Models\Question;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{
    public function index()
    {
        $faqtData = Faq::latest()->first();

        return view('backend.faq.create', compact('faqtData'));
    }


    public function faqSettingData(Request $request)
    {
        $data = [
            'background' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
        foreach (config('app.languages') as $key => $lang) {
            $data[$key.'*.page_title'] = 'required';
            $data[$key.'*.short_desc'] = 'nullable';
            $data[$key.'*.desc'] = 'nullable';
        }
        $validated = $request->validate($data);
        if ($validated) {
            $pageData = new Faq();
            if ($request->method() == 'POST')
            {
                if ($request->hasFile('background')) {
                    $image = $request->file('background');
                    $newName = time().'_'.$image->getClientOriginalName();
                    $request->file('background')->storeAs('images', $newName, 'public');

                    $pageData->background = $newName;
                    $pageData->save();
                    $pageData->update($request->except('background', '_token'));
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                } else {
                    $pageData->create($request->except('background', '_token'));
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                }
            }

            if ($request->method() == 'PUT') {
                $updateDate = Faq::find($request->id);
                if ($request->hasFile('background')) {
                    if (Storage::exists($request->file('background')))
                    {
                        Storage::disk('public')->delete($updateDate->background);
                    } else {

                        $background = $request->file('background');
                        $newName = time().'_'.$background->getClientOriginalName();
//                        dd($newName);
                        $request->file('background')->storeAs('images', $newName, 'public');

                        $updateDate->background = $newName;
                        $updateDate->save();
                        $updateDate->update($request->except('background', '_token'));
                        return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                    }

                } else {
                    $updateDate->update($request->except('background', '_token'));
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                }
            }


            $pageData->create($request->except('background', '_token'));
            return redirect()->back()->with('success', 'The Message Has Been sending Successfully');

        }
    }


    //    FAQ ACTIONS
    public function faqIndex()
    {
        $faqs = Faq::where('publish_for', 'user')->get();
        return view('backend.faq.index', compact('faqs'));
    }

    public function faqName()
    {
        return view('backend.faq.create-faq-name');
    }

    public function insertFaqName(Request $request)
    {
        $data = ['publish_for' => 'required'];
        foreach (config('app.languages') as $key => $lang) {
            $data[$key.'*.faq_name'] = 'required|string';
        }

        $validated = $request->validate($data);
        Faq::create($validated);

        return redirect()->back()->with('success', 'Faq Category Name Successfully Created!');
    }

    public function editFaqName($id)
    {

        $faq = Faq::find($id);
        return view('backend.faq.edit', compact('faq'));

    }

    public function updateFaqName(Request $request)
    {
        $data = ['publish_for' => 'required'];
        foreach (config('app.languages') as $key => $lang) {
            $data[$key.'*.faq_name'] = 'required|string';
        }

        $validator = $request->validate($data);

        $faq= Faq::find($request->id);
        $faq->update($validator);

        return redirect()->back()->with('success', 'Faq Category Name Successfully Created!');
    }


    public function deleteFaqName(Request $request)
    {
        DB::table('faqs')->where('id', $request->id)->delete();

        return redirect()->back()->with('success', 'Faq Category Name Successfully Deleted!');
    }

    public function faqPage()
    {
        $settings = Setting::first()->toArray();
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        $pages = Page::where('status', 'publish')->get();
        $sectionsData = homePage::first();
        $products = Product::all();
        $posts = Post::latest()->take(2)->get();
        $admin = Faq::where('publish_for', 'admin')->first();
        $faqs = Faq::where('publish_for', 'user')->get();
        $questions = Question::with('faq')->get();
        $policies = Policy::where('publish_for', 'admin')->get();

        return view('layouts.homePage.faq', compact('faqs','policies','questions', 'admin', 'posts', 'products', 'pages', 'settings', 'categories', 'sectionsData'));

    }

    public function singleFaq(Request $request)
    {
        $settings = Setting::first()->toArray();
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        $pages = Page::where('status', 'publish')->get();
        $sectionsData = homePage::first();
        $products = Product::all();
        $posts = Post::latest()->take(2)->get();
        $admin = Faq::where('publish_for', 'admin')->first();
        $faqs = Faq::where('publish_for', 'user')->get();
        $questions = Question::with('faq')->get();
        $singleFaq = Question::with('faq')->where('id', $request->id)->get();
        $policies = Policy::where('publish_for', 'admin')->get();

        return view('layouts.homePage.faq', compact('singleFaq','policies', 'faqs','questions', 'admin', 'posts', 'products', 'pages', 'settings', 'categories', 'sectionsData'));
    }


}
