<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\homePage;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\Quotation;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Monarobase\CountryList\CountryListFacade;
use PDF;
class QuotationController extends Controller
{
    public function dashIndex()
    {

        $quotData = Quotation::where('insert_by', 'admin')->latest()->first();
        return view('backend.user.quotation', compact('quotData'));
    }

    public function insertQuotDate(Request $request)
    {
        $data = [
            'background' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
        foreach (config('app.languages') as $key => $lang) {
            $data[$key . '*.page_title'] = 'required';
            $data[$key . '*.short_desc'] = 'nullable';
            $data[$key . '*.desc'] = 'nullable';
        }
        $validated = $request->validate($data);
        if ($validated) {
            if ($request->method() == 'POST') {
                $pageData = new Quotation();

                if ($request->hasFile('background')) {
                    $image = $request->file('background');
                    $newName = time() . '_' . $image->getClientOriginalName();
                    $request->file('background')->storeAs('images', $newName, 'public');

                    $pageData->background = $newName;
                    $pageData->insert_by = 'admin';
                    $pageData->save();
                    $pageData->update($request->except('background', '_token'));
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                } else {
                    $pageData->insert_by = 'admin';
                    $pageData->save();
                    $pageData->update($request->except('background', '_token'));
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                }
            }

            if ($request->method() == 'PUT') {
                $updateDate = Quotation::find($request->id);
                if ($request->hasFile('background')) {

                    Storage::disk('public')->delete($updateDate->background);

                    $background = $request->file('background');
                    $newName = time() . '_' . $background->getClientOriginalName();
                    $request->file('background')->storeAs('images', $newName, 'public');

                    $updateDate->background = $newName;
                    $updateDate->insert_by = 'admin';
                    $updateDate->save();
                    $updateDate->update($request->except('background', '_token'));
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                } else {
                    $updateDate->insert_by = 'admin';
                    $updateDate->save();
                    $updateDate->update($request->except('background', '_token'));
                    return redirect()->back()->with('success', 'The Message Has Been sending Successfully');
                }
            }
        }
    }

    public function userQoutPage()
    {
        $settings = Setting::first()->toArray();
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        $pages = Page::where('status', 'publish')->get();
        $sectionsData = homePage::first();
        $products = Product::all();
        $posts = Post::latest()->take(2)->get();
        $quotData = Quotation::where('insert_by', 'admin')->latest()->first();
        $countries = CountryListFacade::getList(app()->getLocale());
//        dd($curruncies);
        return view('layouts.homepage.quotation', compact('quotData', 'countries', 'settings', 'categories', 'pages', 'sectionsData', 'products', 'posts'));
    }

    public function insertRequiest(Request $request)
    {
        $quot = new Quotation();
        if ($request->hasFile('attachment')) {
            $attach = $request->file('attachment');
            $newName = time() . '_' . $attach->getClientOriginalName();
            $attach->storeAs('images', $newName, 'public');
            $quot->attachment = $newName;
            $quot->save();
            $quot->update($request->except('attachment'));

            return redirect()->back()->with('success', 'The Message Has Been sending Successfully');

        }
        if ($request->hasFile('second_attach')) {
            $secondAttach = $request->file('second_attach');
            $newN = time() . '_' . $secondAttach->getClientOriginalName();
            $secondAttach->storeAs('images', $newN, 'public');
            $quot->second_attach = $newN;
            $quot->save();
            $quot->update($request->except('second_attach'));

            return redirect()->back()->with('success', 'The Message Has Been sending Successfully');

        }
        return redirect()->back()->with('error', 'You Must Be Insert All Data');


    }

//    public function getAllQuotations()
//    {
//        $quots = Quotation::where('insert_by', 'user')->get();
//        $arr = [];
//        foreach ($quots as $qu)
//        {
//            $arr[] = PDF::loadView('backend.user.pdf',(array)$qu);
//        }
//
////        dd($arr);
//        return view('backend.user.quots', compact('quots','arr'));
//    }
//
//    public function generate_pdf()
//    {
//
//        $quots = Quotation::where('insert_by', 'user')->get();
//        $arr = [];
//        foreach ($quots as $qu)
//        {
//            $arr += PDF::loadView('backend.user.pdf', $qu);
//        }
//
//        dd($arr);
//        return $pdfs->stream('document.pdf');
//
//    }


}
