<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',  [FrontendController::class, 'home'])->name('/');
Route::get('/category', [FrontendController::class, 'category'])->name('category');
Route::get('/post/{slug}',  [FrontendController::class, 'post'])->name('post');



// Route::get('/', function () {
//     return view('frontend.homepage');
// });

// Route::get('/products', function(){
//     return view(('frontend.products'));
// });
// Route::get('/single', function(){
//     return view(('frontend.single'));
// });