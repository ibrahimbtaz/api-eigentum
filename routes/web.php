<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UnitController;

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
    return view('welcome');
});



Route::group(['prefix' => '/admin'], function(){
    
    Route::get('/', [AdminController:: class, 'index']);

    Route::group(['prefix' => '/unit'], function(){
        Route::get('/data', [UnitController:: class, 'index']);
        Route::get('/show/{unit}',[UnitController::class,'show']);
        Route::get('/create', [UnitController:: class, 'create']);
        Route::post('/add', [UnitController:: class, 'store']);
        Route::get('/edit/{unit}',[UnitController::class,'edit']);
        Route::post('/update/{unit}', [UnitController:: class, 'update']);
        Route::get('/delete/{unit}',[UnitController::class,'destroy']);
        // Route::get('/search', [UnitController::class,'search']);
    });

    route::group(['prefix' => '/dokter'], function(){
        Route::get('/all', [DashboardDokter:: class, 'index']);
        Route::get('/detail/{dokter}',[DashboardDokter::class,'show']);
        Route::get('/create', [DashboardDokter:: class, 'create']);
        Route::post('/add', [DashboardDokter:: class, 'store']);
        Route::get('/edit/{dokter}',[DashboardDokter::class,'edit']);
        Route::post('/update/{dokter}', [DashboardDokter:: class, 'update']);
        Route::get('/delete/{dokter}',[DashboardDokter::class,'destroy']);
        // Route::get('/search', [DashboardDokter::class,'search']);
    });
});