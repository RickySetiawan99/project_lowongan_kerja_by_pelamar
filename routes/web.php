<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page404\Page404Controller;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Lowongan\LowonganController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\GlobalController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/page404', [Page404Controller::class, 'index'])->name('page404.index');

Route::group(['as' => 'global.'], function () {
    Route::get('get_data/{table}/{isdeleted?}/{limit?}/{select?}/{where?}', [GlobalController::class, 'getData'])->name('get_data');
});

// create route middleware
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // new route for home
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    // route lowongan
    Route::group(['as' => 'lowongan.', 'prefix' => 'lowongan'], function () {
        Route::get('/', [LowonganController::class, 'index'])->name('index');
        Route::post('/search', [LowonganController::class, 'searchLowongan'])->name('search');
    });

    // route news
    Route::group(['as' => 'news.', 'prefix' => 'news'], function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::post('/search', [NewsController::class, 'searchNews'])->name('search');
        Route::get('/detail/{news_id}', [NewsController::class, 'detailNews'])->name('detail');
    });

    // route contact
    Route::group(['as' => 'contact.', 'prefix' => 'contact'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
    });

    // route about
    Route::group(['as' => 'about.', 'prefix' => 'about'], function () {
        Route::get('/', [AboutController::class, 'index'])->name('index');
    });
    
});





