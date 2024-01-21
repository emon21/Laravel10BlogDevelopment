<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;


Route::get('/admin/home',[AdminController::class,'admin'])->name('admin.home')->middleware('admin');



Route::get('admin',[AdminController::class,'admin']);
Route::get('test',[AdminController::class,'index']);
Route::get('demo',[AdminController::class,'demo']);



