<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\homePage;
use App\Http\Requests\StorehomePageRequest;
use App\Http\Requests\UpdatehomePageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{


    public $cat_1;
    public $cat_2;
    public $cat_3;
    public $cat_4;
    public $cat_5;

    public $page_1;
    public $page_2;
    public $page_3;
    public $page_4;

    public function index()
    {
        $categories = Category::where('parent_id', null)->get();
        $pages =  Page::all();
        $homeData =  homePage::query()
        ->latest()
        ->first();

        if (!is_null($homeData)) {
            $cat_ids_json = $homeData->first('cat_ids');
            $page_ids_json = $homeData->first('page_ids');

            $cat_ids = $cat_ids_json;
            $page_ids = $page_ids_json;

            $pages_input = $page_ids['page_ids'];
            $cats = $cat_ids['cat_ids'];

            $decod_cats = json_decode(json_encode($cats), true);
            $decod_pages = json_decode(json_encode($pages_input), true);

            if (is_array($decod_cats) || is_array($decod_pages))
                {
                    foreach ($decod_pages as $key => $page) {
                        if ($key == 'first') {
                            $this->page_1 = $page;
                        }
                        if ($key == 'second') {
                            $this->page_2 = $page;
                        }
                        if ($key == 'third') {
                            $this->page_3 = $page;
                        }
                        if ($key == 'last') {
                            $this->page_4 = $page;
                        }
                    }
                    stripslashes($page);
                    $page_1 = $this->page_1;
                    $page_2 = $this->page_2;
                    $page_3 = $this->page_3;
                    $page_4 = $this->page_4;
                    $arr_2 = array($page_1, $page_2, $page_3, $page_4);

                    foreach ($decod_cats as $key => $cat) {
                        if ($key == 1) {
                            $this->cat_1 = $cat;
                        }
                        if ($key == 2) {
                            $this->cat_2 = $cat;
                        }
                        if ($key == 3) {
                            $this->cat_3 = $cat;
                        }
                        if ($key == 4) {
                            $this->cat_4 = $cat;
                        }
                        if ($key == 5) {
                            $this->cat_5 = $cat;
                        }

                    }
                    stripslashes($cat);
                    $cat_1 = $this->cat_1;
                    $cat_2 = $this->cat_2;
                    $cat_3 = $this->cat_3;
                    $cat_4 = $this->cat_4;
                    $cat_5 = $this->cat_5;
                    $arr = array($cat_1, $cat_2, $cat_3, $cat_4, $cat_5);
                    return view('backend.homepage.index', compact('categories', 'pages', 'homeData', 'arr', 'arr_2'));
                }
            elseif(!is_array($decod_cats) || !is_array($decod_pages)) {

                $decod_p = json_decode($decod_pages, true);
                $page_1 = isset($decod_p['first']) ? count($decod_p['first']) : '';
                $page_2 = isset($decod_p['second']) ? count($decod_p['second']) : '';
                $page_3 = isset($decod_p['third']) ? count($decod_p['third']) : '';
                $page_4 = isset($decod_p['last']) ? count($decod_p['last']) : '';
                $arr_2 = array($page_1, $page_2, $page_3, $page_4);

                $decod = json_decode($decod_cats, true);
                $cat_1 = $decod[1];
                $cat_2 = $decod[2];
                $cat_3 = $decod[3];
                $cat_4 = $decod[4];
                $cat_5 = $decod[5];
                $arr = [$cat_1, $cat_2, $cat_3, $cat_4, $cat_5];

                return view('backend.homepage.index', compact('categories', 'pages', 'homeData', 'arr', 'arr_2'));
            }
        }
        return view('backend.homepage.index', compact('categories', 'pages', 'homeData'));
        //        dd($this->cat_5);
    }
    public function store(StorehomePageRequest $request)
    {
        $validated = $request->validated();
        $data = $request->file('image');;
        $cat_ids = $request->cat_ids;
        $page_ids = $request->page_id;
        $json_page = json_encode($page_ids, JSON_UNESCAPED_SLASHES);
        $json_data = json_encode($cat_ids, JSON_UNESCAPED_SLASHES);

        if ($request->id == null) {
            if ($request->hasFile('image') || $request->hasFile('catalog')) {
                foreach ($data as $file) {

                        $name = 'homePage'.'-'.time() .'.'. $file->getClientOriginalName();
                        $file->storeAs('images', $name, 'public');
                        $newProd = homePage::create($validated);
                        $newProd->cat_ids = stripslashes($json_data);
                        $newProd->page_ids = stripslashes($json_page);
                        $newProd->save();

                        if (isset($data['slider_image'])) {
                            $name = 'homePage'.'-'.time() .'.'. $data['slider_image']->getClientOriginalName();
                            $newProd->slider_image = $name;
                            $newProd->save();
                        }
                        if (isset($data['first_banner'])) {
                            $name = 'homePage'.'-'.time() .'.'. $data['first_banner']->getClientOriginalName();
                            $newProd->first_banner = $name;
                            $newProd->save();
                        }
                        if (isset($data['second_banner'])) {
                            $name = 'homePage'.'-'.time() .'.'. $data['second_banner']->getClientOriginalName();
                            $newProd->second_banner = $name;
                            $newProd->save();
                        }
                        if (isset($data['third_banner_left'])) {
                            $name = 'homePage'.'-'.time() .'.'. $data['third_banner_left']->getClientOriginalName();
                            $newProd->third_banner_left = $name;
                            $newProd->save();;
                        }
                        if (isset($data['third_banner_right'])) {
                            $name = 'homePage'.'-'.time() .'.'. $data['third_banner_right']->getClientOriginalName();
                            $newProd->third_banner_right = $name;
                            $newProd->save();
                        }
                        if (isset($data['fourth_banner'])) {
                            $name = 'homePage'.'-'.time() .'.'. $data['fourth_banner']->getClientOriginalName();
                            $newProd->fourth_banner = $name;
                            $newProd->save();
                        }
                        if (isset($data['catalog_image'])) {
                            $name = 'homePage'.'-'.time() .'.'. $data['catalog_image']->getClientOriginalName();
                            $newProd->catalog_image = $name;
                            $newProd->save();
                        }
                }
                if ($request->hasFile('catalog')) {

                    $name = 'homePage'.'-'.time() .'.'. $request->file('catalog')->getClientOriginalName();
                    $newProd->catalog = $name;
                    $request->file('catalog')->storeAs('images', $name, 'public');
                    $newProd->save();
                }
                return redirect()->back()->with('success', 'Post has been created successfully.');

            } else {

                $newProd = homePage::create($validated);
                $newProd->cat_ids = $json_data;
                $newProd->page_ids = $json_page;
                $newProd->save();
                return redirect()->back()->with('success', 'Post has been created successfully.');
            }
        }else {
            $exactData = homePage::find($request->id);
            if ($request->hasFile('image') || $request->hasFile('catalog')) {
                if (isset($data))
                {

                    foreach ($data as $file) {
                        Storage::disk('public')->delete($exactData->image);
                        $name = 'homePage'.'-'.time().'.'.$file->getClientOriginalName();
                        $file->storeAs('images', $name, 'public');
                        $exactData->update($validated);
                        $exactData->cat_ids = stripslashes($json_data);
                        $exactData->page_ids = stripslashes($json_page);
                        $exactData->save();

                        if (isset($data['slider_image'])) {
                            $name = 'homePage'.'-'.time().'.'.$data['slider_image']->getClientOriginalName();
                            DB::table('home_pages')->update(['slider_image' => $name]);

                        }
                        if (isset($data['first_banner'])) {
                            $name = 'homePage'.'-'.time().'.'.$data['first_banner']->getClientOriginalName();
                            DB::table('home_pages')->update(['first_banner' => $name]);
                        }
                        if (isset($data['second_banner'])) {
                            $name = 'homePage'.'-'.time().'.'.$data['second_banner']->getClientOriginalName();
                            DB::table('home_pages')->update(['second_banner' => $name]);
                        }
                        if (isset($data['third_banner_left'])) {
                            $name = 'homePage'.'-'.time().'.'.$data['third_banner_left']->getClientOriginalName();
                            DB::table('home_pages')->update(['third_banner_left' => $name]);
                        }
                        if (isset($data['third_banner_right'])) {
                            $name = 'homePage'.'-'.time().'.'.$data['third_banner_right']->getClientOriginalName();
                            DB::table('home_pages')->update(['third_banner_right' => $name]);
                        }
                        if (isset($data['fourth_banner'])) {
                            $name = 'homePage'.'-'.time().'.'.$data['fourth_banner']->getClientOriginalName();
                            DB::table('home_pages')->update(['fourth_banner' => $name]);
                        }
                        if (isset($data['catalog_image'])) {
                            $name = 'homePage'.'-'.time().'.'.$data['catalog_image']->getClientOriginalName();
                            DB::table('home_pages')->update(['catalog_image' => $name]);
                        }

                    }
                }
                if ($request->hasFile('catalog')) {
                    Storage::disk('public')->delete($exactData->catalog);

                    $name = 'homePage'.'-'.time().'.'.$request->file('catalog')->getClientOriginalName();
                    $request->file('catalog')->storeAs('images', $name, 'public');
                    DB::table('home_pages')->update(['catalog' => $name]);
                }

                return redirect()->back()->with('success', 'Post has been created successfully.');

            } else {
                $exactData->update($validated);
                $exactData->save();
                return redirect()->back()->with('success', 'Post has been created successfully.');
            }
        }
    }
}
