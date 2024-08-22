<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\HomeController;

Route::get('welcome',function(){
    return view('welcome');});
Route::get('/',function(){
    return view('hello');
})->name('page');

Route::get('all',[AdminController::class,'index'])
->name('block');
Route::get('about',[AdminController::class,'about'])
->name('about');
Route::get('write',[AdminController::class,'write'])
->name('form');
Route::post('insert',[AdminController::class,'insert']);
Route::get('delete/{id}',[AdminController::class, 'delete'])->name('delete');
Route::get('change/{id}', [AdminController::class, 'change'])->name('change');
Route::get('edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('update/{id}',[AdminController::class,'update'])->name('update');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
