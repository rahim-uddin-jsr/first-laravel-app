<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home',["page_name"=>"Home"]);
})->name('home');
Route::get('/about-us', function () {
    return view('about',['page_name'=> 'About']);
})->name('about');
Route::get('/contact-us', function () {
    // return view('contact');
    return view('contact',['page_name'=> 'Contact']);
})->name('contact');
Route::get('/services-page', function () {
    $page_name='Services';
    $products = [
        1 => [
            'name' => 'Bag',
            'color' => 'Red',
            'price' => '1200',
            'image' => 'https://example.com/bag.jpg',
        ],
        2 => [
            'name' => 'Sunglasses',
            'color' => 'Black',
            'price' => '550',
            'image' => 'https://example.com/sunglasses.jpg',
        ],
        3 => [
            'name' => 'Body Spray',
            'color' => 'Blue',
            'price' => '850',
            'image' => 'https://example.com/bodyspray.jpg',
        ],
        4 => [
            'name' => 'Laptop',
            'color' => 'Silver',
            'price' => '2000',
            'image' => 'https://example.com/laptop.jpg',
        ],
        5 => [
            'name' => 'Headphones',
            'color' => 'White',
            'price' => '150',
            'image' => 'https://example.com/headphones.jpg',
        ],
        6 => [
            'name' => 'Watch',
            'color' => 'Gold',
            'price' => '1200',
            'image' => 'https://example.com/watch.jpg',
        ],
        7 => [
            'name' => 'Shoes',
            'color' => 'Brown',
            'price' => '800',
            'image' => 'https://example.com/shoes.jpg',
        ],
        8 => [
            'name' => 'Perfume',
            'color' => 'Pink',
            'price' => '750',
            'image' => 'https://example.com/perfume.jpg',
        ],
        9 => [
            'name' => 'Backpack',
            'color' => 'Green',
            'price' => '500',
            'image' => 'https://example.com/backpack.jpg',
        ],
        10 => [
            'name' => 'Mobile Phone',
            'color' => 'Black',
            'price' => '1000',
            'image' => 'https://example.com/mobilephone.jpg',
        ],
    ];
    // return redirect('/');
return response($products)
->header("Content-Type", "application/json")
->cookie('name', '', time() - 1);
    // return view('services', compact('page_name', 'products'));
})->name('services');
Route::get('/users/{user_id}', function ($user_id) {
    // return view('services');
    return $user_id;
})->name('users')->where(['user_id' => '[0-9]+']);

Route::get('/category/{category_name}', function ($category_name){
    echo $category_name;
})->whereIn('category_name', ['electronics', 'movie', 'books', 'watch', 'laptop']);

Route::get('/search/{search_param}', function($search_param) {
    echo "$search_param";
})-> where('search_param', '.*');

Route::get('downloads', function () {
    return response()->download(public_path('/files-posd.pdf'),'pos application.pdf');
});



Route::prefix('page')->name('laravel.')->group(function() {
Route::get('page-1', function() {
return "page-1";
});
Route::get('login', function() {
return "login";
})->name('login');
Route::get('page-2', function() {
return "page-2";
});
Route::get('page-3', function() {
return "page-3";
})->middleware('auth');
Route::get('page-4', function(Request $request) {
    // dd($request->all());
    // dd($request->input());
    // dd($request->all());
    dd($request->collect());
    // dd($request->all()['search']);

return "page-4";
});
});
