<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
Route::get('change/{id}', [AdminController::class, 'update'])->name('update');