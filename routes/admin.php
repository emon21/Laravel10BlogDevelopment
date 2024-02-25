<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\Tag;

// Route::get('/admin/home',[AdminController::class,'admin'])->name('admin.dashboard')->middleware('admin');



Route::get('test',[AdminController::class,'index']);
Route::get('demo',[AdminController::class,'demo']);

//    Route::get('/', [AdminController::class, 'index'])->name('adminlogin');

// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function (){

// });
   Route::prefix('admin')->middleware(['auth','admin'])->group(function (){

        Route::get('/',[AdminController::class,'adminlogin']);
        Route::get('/home', [AdminController::class, 'admin'])->name('admin.home');

        // ____ Category Crud Route ____ //
        Route::resource('/category',CategoryController::class);
        Route::resource('/post',PostController::class);
        Route::resource('/tag',TagController::class);
        // Route::resource('/setting',SettingController::class);

        //setting route
        Route::get('/setting',[SettingController::class,'edit'])->name('setting.index');
        Route::post('/setting/update',[SettingController::class,'update'])->name('setting.update');


        // user profile update route
        Route::resource('user',UserController::class);

        // profile change
        Route::get('/profile',[UserController::class,'profile'])->name('profile');
        Route::post('/profile/update',[UserController::class,'updateprofile'])->name('profile.update');


   });

//    Route::group(['prefix' => 'admin','middleware' => ['auth']],function(){




// //change password

// // Route::get('/password/change', [UserController::class, 'PasswordChange'])->name('password.change');

// // //update password
// // Route::post('update/password/', [UserController::class, 'UpdatePassword'])->name('update.password');

//     // Route::get('/admin/profile/', [AdminController::class, 'profile']);
//     // Route::post('admin/profile/updateprofile',[AdminController::class,'updateprofile']);

//    });

//    Route::get('/post',function(){
//     $tag = Tag::first();
//     $post = Post::first();
//     $post->tags()->attach([2,3,4]);
//     dd($post);

// });


// Route::group(['middleware' => 'admin'], function() {
//     // Route::get('admin',[AdminController::class,'adminlogin']);
//     Route::get('/', [AdminController::class, 'index'])->name('adminlogin');

//     Route::get('/admin/dashboard', [AdminController::class, 'admin'])->name('admin.dashboard');

//     Route::post('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

// });
