<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TvController;
use App\Http\Livewire\TvFiles;
use App\Http\Controllers\MonitorController;
USE App\Http\Controllers\UserController;
// use App\Http\Controllers\LocationController;
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
    return view('login');
});
Route::get('/welcome', [AuthController::class, 'welcome'])->name('welcome');
Route::get('/login/load', [AuthController::class, 'LoadLogin'])->name('Login-page');
Route::post('/login/post', [AuthController::class, 'Login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
  
// Route::get('/signage/{sign_id}', [SignageController::class, 'show'])->name('signage.show');
// Route::get('/signage', [SignageController::class, 'index'])->name('signage.index');
// // Route::get('/signage/create', [SignageController::class, 'create'])->name('signage.create');
// Route::post('/signage/store', [SignageController::class, 'store'])->name('signage.store');
// Route::delete('/signage/delete{sign_id}', [SignageController::class, 'destroy'])->name('signage.delete');
// Route::get('/signage/edit', [SignageController::class, 'edit'])->name('signage.edit');
// Route::get('/create/signage',[SignageController::class,'createSignage'])->name('signage.create');    

Route::resource('/signages', SignageController::class)->names([
    'index'   => 'signage.index',
    'create'  => 'signage.create',
    'store'   => 'signage.store',
    'show'    => 'signage.show',
    'edit'    => 'signage.edit',
    'update'  => 'signage.update',
    'destroy' => 'signage.delete',
]);
Route::resource('signage-tvs', TvController::class)->names([
    'index'   => 'tv.index',
    'create'  => 'tv.create',
    'store'   => 'tv.store',
    'show'    => 'tv.show',
    'edit'    => 'tv.edit',
    'update'  => 'tv.update',
    'destroy' => 'tv.delete',
]);

Route::resource('user', UserController::class)->names([
    'index'   => 'user.index',
    'create'  => 'user.create',
    'store'   => 'user.store',
    'show'    => 'user.show',
    'edit'    => 'user.edit',
    'update'  => 'user.update',
    'destroy' => 'user.delete',
]);
// Route::resource('signage-location', LocationController::class)->names([
//     'index'   => 'location.index',
//     'create'  => 'location.create',
//     'store'   => 'location.store',
//     'show'    => 'location.show',
//     'edit'    => 'location.edit',
//     'update'  => 'location.update',
//     'destroy' => 'location.delete',
// ]);

// Route::get('/tv/{tv}', [TvController::class, 'showByTv'])->name('signage.tv');
Route::get('/monitor', [MonitorController::class, 'showAllTvFiles'])->name('monitor.tv');

// Route::get('/tv/{tv}', TvFiles::class)->name('tv.display');

Route::get('/tv/{tv}', function ($tv) {
    return view('tv-display', ['tv' => $tv]);
})->name('tv.display');


// Route::get('/tv/{tv}', function ($tv) {
//     return view('tv-display', ['tv' => $tv]);
// })->name('tv.display'); // ✅ 


// Route::get('/tv/{tv}/check-update', [TvController::class, 'checkUpdate'])->name('tv.checkUpdate');

// Route::get('/tv/{tv}', TvDisplay::class);
