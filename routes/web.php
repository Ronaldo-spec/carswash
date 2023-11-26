<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
    });

Route::get('/home', function () {
    return view('welcome');
    });

Auth::routes();

//controller admin

Route::group(['middleware' => ['cekRole:admin']], function () {
    route::resource('admin', AdminController::class);
    Route::get('/home-admin', [App\Http\Controllers\HomeController::class, 'adminindex'])->name('home.admin');
    });




Route::group(['middleware' => ['cekRole:user']], function () {
    Route::get('/home-user', [App\Http\Controllers\HomeController::class, 'userindex'])->name('home.user');


    //Controller Cuci
    Route::get('/home-user/cuci/{id}', [App\Http\Controllers\cuciController::class, 'index']);

    Route::post('/home-user/cuci/{id}', [App\Http\Controllers\cuciController::class, 'store']);

    Route::get('/home-user/checkout', [App\Http\Controllers\cuciController::class, 'show']);

    Route::delete('/home-user/checkout/{id}', [App\Http\Controllers\cuciController::class, 'destroy']);

    Route::get('/home-user/konfirmasi-checkout', [App\Http\Controllers\cuciController::class, 'konfirmasi']);

    //Controller Profile
    Route::get('/home-user/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

    Route::post('/home-user/profile', [App\Http\Controllers\ProfileController::class, 'update']);


    //Controller History
    Route::get('/home-user/history', [App\Http\Controllers\HistoryController::class, 'index']);

    Route::get('/home-user/history/{id}', [App\Http\Controllers\HistoryController::class, 'detail']);
    });


    // -----------------------------------------------------------------------------------------
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('cuci/{id}', [App\Http\Controllers\cuciController::class, 'index']);

// Route::post('cuci/{id}', [App\Http\Controllers\cuciController::class,'store']);

// Route::get('checkout', [App\Http\Controllers\cuciController::class, 'show']);

// Route::delete('checkout/{id}', [App\Http\Controllers\cuciController::class, 'destroy']);

// Route::get('konfirmasi-checkout', [App\Http\Controllers\cuciController::class, 'konfirmasi']);

// Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

// Route::post('profile', [App\Http\Controllers\ProfileController::class, 'update']);

// Route::get('history', [App\Http\Controllers\HistoryController::class, 'index']);

// Route::get('history/{id}', [App\Http\Controllers\HistoryController::class, 'detail']);
