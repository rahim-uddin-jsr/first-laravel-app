<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\GetInfoWithSequrityKey;
use App\Http\Controllers\UserController;
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

Route::get('/',[FrontController::class,'home'])->name('home');
Route::get('/about-us', [FrontController::class,'about'])->name('about');
Route::get('/contact-us', [FrontController::class,'contactUs'])->name('contact');
Route::get('/services-page',[FrontController::class,'services'])->name('services');


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
Route::get('users', [UserController::class,'getUsers']);
Route::get('login', function() {
return "login";
})->name('login');
Route::get('get-secure-info', GetInfoWithSequrityKey::class);
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
