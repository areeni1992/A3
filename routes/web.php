<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'auth'
    ], function() {

    Route::get('/', [CategoryController::class, 'index']);
    Route::get('category', [CategoryController::class, 'categories'])->name('categories');
    Route::get('category/edit/{id}', [CategoryController::class, 'editCategory'])->name('editCategory');
    Route::post('category/update/{id}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
    Route::get('category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
    Route::any('category/create', [CategoryController::class, 'createCategory'])->name('createCategory');

});

Route::group(
    [
    'prefix' => 'admin',
    'middleware' => 'auth'
    ], function () {

    Route::get('posts', [PostController::class, 'index'])->name('posts');
    Route::get('posts/create', [PostController::class, 'create'])->name('createPost');
    Route::post('posts/store', [PostController::class, 'store'])->name('storePost');
    Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('editPost');
    Route::put('posts/update/{id}', [PostController::class, 'update'])->name('updatePost');
    Route::get('posts/delete/{id}', [PostController::class, 'destroy'])->name('deletePost');
});


Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'auth'
    ], function () {

    Route::get('settings', [SettingController::class, 'index'])->name('settings');
    Route::any('settings/upload-setting/{id?}', [SettingController::class, 'uploadSetting'])->name('uploadSetting');

});


Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'auth'
    ], function () {

    Route::get('pages', [PageController::class, 'index'])->name('pages');
    Route::get('pages/create', [PageController::class, 'create'])->name('createPage');
    Route::post('pages/store', [PageController::class, 'store'])->name('storePage');

});
