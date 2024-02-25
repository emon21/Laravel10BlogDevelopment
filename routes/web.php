<?php

use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/demo2', [App\Http\Controllers\HomeController::class, 'demo']);



Route::group(['prefix' => 'user','middleware' => ['auth']],function(){
    // Route::get('/post',[FrontendController::class,'index'])->name('user.post');
    // profile change
    Route::get('/profile',[UserController::class,'UserProfile'])->name('user.UserProfile');
    Route::post('/profile/update',[UserController::class,'UserUpdateProfile'])->name('UserUpdateProfile');

   });


//login route of admin

    //change password

    Route::get('/password/change', [UserController::class, 'PasswordChange'])->name('password.change');

    //update password
    Route::post('update/password/', [UserController::class, 'UpdatePassword'])->name('update.password');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login')->middleware('guest:admin');

// Route::post('/admin/login/store', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

// Route::group(['middleware' => 'admin'], function() {

//     Route::get('/admin', [HomeController::class, 'index'])->name('admin.dashboard');

//     Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

// });
