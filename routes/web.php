<?php

use App\Http\Controllers\category_controller;
use App\Http\Controllers\contact_controller;
use App\Http\Controllers\product_controller;
use Illuminate\Support\Facades\Route;

Route::get('/', [category_controller::class,'index']);
 
//home page route
Route::get('/hom', function () {
    return view('pages.home');
});

//about page route
Route::get('/about', function () {
    return view('pages.about');
});
//contact page route
Route::get('/contact', function () {
    return view('pages.contact');
});
//watch service page route
Route::get('/sevice', [product_controller::class,'productshowonshop']);

//route for store contact in database
Route::post('/contactstore',[contact_controller::class,'contactdetail']);

//admin page route
Route::get('/dashboard', function () {
    return view('admin.layout.dashboard');
});


//Category All Route
Route::get('/categoryform',function(){
    return view('admin.pages.categoryform');
});
//category store and list
Route::get('/categorylist',[category_controller::class,'showcategory']);
Route::post('/categorystore',[category_controller::class,'categoryadd']);
Route::get('category/{id}', [category_controller::class, 'destroyCategory'])->name('category.destroy');
Route::get('/category/edit/{id}', [category_controller::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [category_controller::class, 'update'])->name('category.update');
Route::get('/category/view/{id}', [category_controller::class, 'categoryshow'])->name('category.view');



//product all Routes

Route::get('/productform',[product_controller::class,'selectcat']);
Route::post('/productform',[product_controller::class,'addproduct'])->name('addproduct');
Route::get('/productalllist',[product_controller::class,'productshow'])->name('productlist');
Route::get('/deleteproduct/{id}',[product_controller::class,'deleteproduct'])->name('deleteproduct');
Route::get('/product/edit/{id}', [product_controller::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [product_controller::class, 'update'])->name('product.update');
Route::get('/product/view/{id}', [product_controller::class, 'show'])->name('product.view');



Route::get('/addtocart/{id}', [product_controller::class, 'addtocart'])->name('addtocart');
Route::get('/showcart', [product_controller::class, 'showdataoncart'])->name('showcart');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
