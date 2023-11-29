<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LiveSearchController;

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
    return view('live_search');
});

Route::get('live_search', [LiveSearchController::class, 'index']);

Route::get('search', [LiveSearchController::class, 'liveSearchTable']);

// Thêm route mới để tải dữ liệu ban đầu
Route::get('load_initial_data', [LiveSearchController::class, 'loadInitialData']);