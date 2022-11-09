<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Layouts\HomePage\HomeController;
use App\Http\Controllers\NewsLatterController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\AgentController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::any('/contact-us', [HomeController::class, 'contactPage'])->name('contactPage');
Route::get('page/show/{page}', [HomeController::class, 'showPage'])->name('showPage');
Route::get('posts/show/{post}', [HomeController::class, 'showPost'])->name('showPost');
Route::get('posts/categories/{id?}', [HomeController::class, 'getSubCategories'])->name('getSubCategories');
Route::post('/newsletter/post', [NewsLatterController::class, 'store'])->name('newsletter');
Route::get('/careers', [CareerController::class, 'index'])->name('careerPage');
Route::post('/careers/send', [CareerController::class, 'requestCareer'])->name('requestCareer');
Route::get('/user-qoutation-page', [QuotationController::class, 'userQoutPage'])->name('userQoutPage');
Route::post('/send-request', [QuotationController::class, 'insertRequiest'])->name('insertRequiest');
Route::get('/agents', [AgentController::class, 'index'])->name('agentsPage');
Route::post('/agents/send', [AgentController::class, 'requestAgent'])->name('requestAgent');

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'auth'
    ], function () {
    Route::get('/subscribers', [NewsLatterController::class, 'subscribers'])->name('subscribers');
    Route::get('/messages', [NewsLatterController::class, 'messages'])->name('messages');
    Route::get('/career', [CareerController::class, 'insert'])->name('insert');
    Route::any('/insert-career-page-date/{id?}', [CareerController::class, 'insertPageDate'])->name('insertPageDate');
    Route::get('/quotation', [QuotationController::class, 'dashIndex'])->name('dashIndex');
    Route::any('/quotation/{id?}', [QuotationController::class, 'insertQuotDate'])->name('insertQuotDate');
    Route::get('/quotations', [QuotationController::class, 'getAllQuotations'])->name('getAllQuotations');
    Route::get('/quotations/generate_pdf/{id}', [QuotationController::class, 'generate_pdf'])->name('generate_pdf');
    Route::get('/agents', [AgentController::class, 'insert'])->name('agentsDash');
    Route::any('/insert-agent-page-date/{id?}', [AgentController::class, 'insertPageDate'])->name('insertPageDate');


});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Categories
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

//Posts
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

//Settgins
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
    Route::get('pages/edit/{id}', [PageController::class, 'edit'])->name('editPage');
    Route::put('pages/update/{id}', [PageController::class, 'update'])->name('updatePage');
    Route::get('pages/delete/{id}', [PageController::class, 'destroy'])->name('deletePage');

});

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'auth'
    ], function () {

    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('products/create', [ProductController::class, 'create'])->name('createProduct');
    Route::post('products/store', [ProductController::class, 'store'])->name('storeProduct');
    Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('editProduct');
    Route::put('products/update/{id}', [ProductController::class, 'update'])->name('updateProduct');
    Route::get('products/delete/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');

});

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'auth'
    ], function () {

    Route::get('homepage', [HomePageController::class, 'index'])->name('homePage');
    Route::any('homepage/store/{id?}', [HomePageController::class, 'store'])->name('storeHomePage');
//    Route::get('products/create', [HomePageController::class, 'create'])->name('createProduct');
//    Route::get('products/edit/{id}', [HomePageController::class, 'edit'])->name('editProduct');
//    Route::put('products/update/{id}', [HomePageController::class, 'update'])->name('updateProduct');
//    Route::get('products/delete/{id}', [HomePageController::class, 'destroy'])->name('deleteProduct');

});
