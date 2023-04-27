<?php

use Illuminate\Support\Facades\Route;

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




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/create', [App\Http\Controllers\HomeController::class, 'create'])->name('admin.create');
Route::post('/home/{newpost}', [App\Http\Controllers\HomeController::class, 'store'])->name('admin.store');
Route::get('/home/{id}/delete', [App\Http\Controllers\HomeController::class, 'delete'])->name('admin.delete');
Route::get('/home/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('admin.edit');
Route::get('/home/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('admin.update');
