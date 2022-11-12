<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\homePage;
use App\Models\Page;
use App\Models\Policy;
use App\Models\Post;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        Validator::extend('slug', function ($attribute, $value, $parameters, $validator) {
            return $value === str_slug($value);
        });
        View::share([
            'settings' => Setting::first()->toArray(),
            'categories' => Category::where('parent_id', null)->orderby('name', 'asc')->get(),
            'pages' => Page::where('status', 'publish')->get(),
            'sectionsData' => homePage::first(),
            'products' => Product::all(),
            'posts' => Post::latest()->take(2)->get(),
            'policies' => Policy::where('publish_for', 'admin')->get()

        ]);
    }
}
