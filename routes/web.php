<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignageController;
use App\Http\Controllers\AuthController;
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
  
Route::get('/signage/{sign_id}', [SignageController::class, 'show'])->name('signage.show');
Route::get('/signage', [SignageController::class, 'index'])->name('signage.index');
// Route::get('/signage/create', [SignageController::class, 'create'])->name('signage.create');
Route::post('/signage/store', [SignageController::class, 'store'])->name('signage.store');
Route::delete('/signage/delete{sign_id}', [SignageController::class, 'destroy'])->name('signage.delete');
Route::get('/signage/edit', [SignageController::class, 'edit'])->name('signage.edit');


Route::get('/create/signage',[SignageController::class,'createSignage'])->name('signage.create');    