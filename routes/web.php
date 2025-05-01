<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
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
  
Route::get('/signage/{sign_id}', [ContentController::class, 'show'])->name('user.index');
Route::get('/content', [ContentController::class, 'index'])->name('content.index');
Route::get('/content/create', [ContentController::class, 'create'])->name('content.create');
Route::post('/content/store', [ContentController::class, 'store'])->name('content.store');
Route::delete('/signage/delete{sign_id}', [ContentController::class, 'destroy'])->name('content.delete');
Route::get('/signage/edit', [ContentController::class, 'edit'])->name('content.edit');


Route::get('/test',[ContentController::class,'test'])->name('test');