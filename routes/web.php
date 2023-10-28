<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;

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

//https://www.youtube.com/watch?v=Vj-328D4r9c&list=PLNtnJysLIhseqB7b6U-cRLrvCbWRwYyiZ
Route::get("/", [FrontendController::class,"index"])->name("front.index");
Route::get("single-post", [FrontendController::class,"single"])->name("front.single");
