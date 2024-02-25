<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Models\Post;


// =========== Front End Route ============== //

route::get('/',[FrontendController::class,'index'])->name('website');
route::get('/about',[FrontendController::class,'about'])->name('website.about');
route::get('/category/{slug}',[FrontendController::class,'category'])->name('website.category');
route::get('/contact',[FrontendController::class,'contact'])->name('website.contact');
route::get('/post/{slug:category_name}',[FrontendController::class,'post'])->name('website.post');
route::get('/tag/{slug}',[FrontendController::class,'tag'])->name('website.tag');

Route::get('/blog',[FrontendController::class,'blog'])->name('website.blog');
Route::get('/categorylist',[FrontendController::class,'CategoryList'])->name('website.category.list');




route::get('/test',function(){

    // $user = request(key:'user');
    // return view('',compact('user'));
    // https://i.picsum.photos/id/76/600/400.jpg
    $posts = Post::all();
    $id = 75;
    foreach($posts as $post){
        $post->post_photo = 'https://picsum.photos/id/'.$id.'/400/300.jpg';
        $post->save();
        $id++;
    }
    return $posts;
});



// ===================== User Controller Route Start ================

// Route::middleware(['auth'])->group(function (){

// });

  //user Post CRUD
//   Route::get('/post',[FrontendController::class,'index'])->name('user.post');
  Route::get('/insertpost', [UserController::class,'InserPost'])->name('insert.post');
//   Route::post('/createpost', [UserController::class,'CreatePost'])->name('create.post');
  Route::post('/createpost', [UserController::class,'StorePost'])->name('store.post');
  Route::get('/postlist', [UserController::class,'PostList'])->name('post.list');
  Route::get('/postView/{post}', [UserController::class,'PostView'])->name('post.view');
  Route::get('/postEdit/{post}', [UserController::class,'postEdit'])->name('post.edit');
  Route::post('/postUpdate/{post}', [UserController::class,'PostUpdate'])->name('post.update');
  Route::delete('/postDelete/{post}', [UserController::class,'postDelete'])->name('post.delete');



Route::group(['prefix' => 'user','middleware' => ['auth']],function(){

    // Route::get('/post',[FrontendController::class,'index'])->name('post');
    Route::get('/post',[UserController::class,'user'])->name('user.post');
    // profile change
    Route::get('/profile',[UserController::class,'UserProfile'])->name('user.UserProfile');
    Route::post('/profile/update',[UserController::class,'UserUpdateProfile'])->name('UserUpdateProfile');

});


Route::post('/comment',[CommentController::class,'UserComment'])->name('userComment');
Route::delete('/comment/delete/{comment}',[CommentController::class,'destroy'])->name('comment.delete');




// ===================== User Controller Route End =====================


// Route::group(['prefix' => 'website','middleware' => ['auth']],function(){



// });

