<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\homePage;
use App\Models\Page;
use App\Models\Policy;
use App\Models\Post;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function policySettingPage()
    {
        $agenstData= Policy::where('publish_for', 'admin')->latest()->first();

        return view('backend.policy.policysetting', compact('agenstData'));
    }

    public function policySetting(Request $request)
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
            if ($request->method() == 'POST') {
                $pageData = new Policy();

                if ($request->hasFile('background')) {
                    $image = $request->file('background');
                    $newName = time() . '_' . $image->getClientOriginalName();
                    $request->file('background')->storeAs('images', $newName, 'public');

                    $pageData->background = $newName;
                    $pageData->save();
                    $pageData->update($request->except('background', '_token'));
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                } else {
                    $pageData->update($request->except('background', '_token'));
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                }
            }

            if ($request->method() == 'PUT') {
                $updateDate = Policy::find($request->id);
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
        }
    }
    public function index()
    {

        $faqs = Policy::where('publish_for', 'user')->get();
        return view('backend.policy.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('backend.policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = ['publish_for' => 'required'];
        foreach (config('app.languages') as $key => $lang) {
            $data[$key.'*.policy_name'] = 'required|string';
            $data[$key.'*.policy_content'] = 'required|string';
        }

        $validated = $request->validate($data);
        Policy::create($validated);

        return redirect()->back()->with('success', 'Faq Category Name Successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function show(Policy $policy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Policy::find($id);

        return view('backend.policy.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = ['publish_for' => 'required'];
        foreach (config('app.languages') as $key => $lang) {
            $data[$key.'*.policy_name'] = 'required|string';
            $data[$key.'*.policy_content'] = 'required|string';
        }
        $validated = $request->validate($data);

        $faq= Policy::find($request->id);
        $faq->update($validated);

        return redirect()->back()->with('success', 'Faq Category Name Successfully Created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('policy')->where('id', $request->id)->delete();

        return redirect()->back()->with('success', 'Policy Successfully Deleted!');
    }

    public function PolicyPage()
    {
        $settings = Setting::first()->toArray();
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        $pages = Page::where('status', 'publish')->get();
        $sectionsData = homePage::first();
        $products = Product::all();
        $posts = Post::latest()->take(2)->get();
        $admin = Policy::where('publish_for', 'admin')->first();
        $faqs = Policy::where('publish_for', 'user')->latest()->first();
        $pols = Policy::where('publish_for', 'user')->get();
        return view('layouts.homePage.policy', compact('pols', 'faqs', 'admin', 'posts', 'products', 'pages', 'settings', 'categories', 'sectionsData'));

    }

    public function singlePolicy(Request $request)
    {
        $settings = Setting::first()->toArray();
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        $pages = Page::where('status', 'publish')->get();
        $sectionsData = homePage::first();
        $products = Product::all();
        $posts = Post::latest()->take(2)->get();
        $admin = Policy::where('publish_for', 'admin')->first();
        $faqs = Policy::where('publish_for', 'user')->get();
        $questions = Policy::get();
        $singleFaq = Policy::where('id', $request->id)->get();

        $pols = Policy::where('publish_for', 'user')->get();

        return view('layouts.homePage.policy', compact('pols','singleFaq', 'faqs','questions', 'admin', 'posts', 'products', 'pages', 'settings', 'categories', 'sectionsData'));
    }
}
