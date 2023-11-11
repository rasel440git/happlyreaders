<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\BackEndController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
//https://www.youtube.com/watch?v=rqtcGn3eO6k&list=PLNtnJysLIhseqB7b6U-cRLrvCbWRwYyiZ&index=2

Route::get('/', [FrontendController::class,'index'])->name('front.index');
Route::get('single-post', [FrontendController::class,'single'])->name('front.single');

Route::group(['prefix'=> 'dashboard'], function () {
    Route::get('/', [BackEndController::class,'index'])->name('front.back');
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);



}); 


require __DIR__.'/auth.php';
