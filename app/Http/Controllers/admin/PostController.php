<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories =DB::table('categories')->get();
        $tags =DB::table('tags')->get();
        $posts =Post::orderBy('id','DESC')->get();
        return view('backend.post.index',compact('posts','tags','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories =DB::table('categories')->get();
        // $tags =DB::table('tags')->get();
        return view('backend.post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation
        // $validated = $request->validate([
        //     'post_title' => 'required|unique:categories',
        // ]);

        // $post = New Post();

        // return $request->post_desc;
        $user = Auth::user()->id;
        // $post->category_id = $request->category_list;
        // $post->user_id = $user;
        // $post->post_title = $request->post_name;
        // $post->slug = Str::slug($request->post_name,'-');
        // $post->post_description = $request->post_desc;
        // $post->post_photo = 'default.jpg';
        // $post->published_at = Carbon::now();

        $post = Post::create([
            'category_id' => $request->category_list,
            'user_id' => $user,
            'post_title' => $request->post_name,
            'slug' =>  Str::slug($request->post_name,'-'),
            'post_description' => $request->post_desc,
            'post_photo' => 'default.jpg',
            'published_at' => Carbon::now(),
         ]);



         //multiple data insert
        $post->tags()->attach($request->tags);


        if($request->has('post_picture')){
            $img_url = time().'.'.$request->post_picture->getClientOriginalextension();
            // $filename = time() . '.' .$request->post_picture->getClientOriginalextension();
            $request->post_picture->move('backend/post/', $img_url);

            // $image->move('backend/post',$image);
            $post->post_photo = 'backend/post/'.$img_url;
            $post->save();
        }

        $notification = array('message' => ' Post Created Successfully !!', 'alert-type' => 'success','timeOut' => 30000,);
        return redirect()->route('post.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // return $post;
        $tags = Tag::all();
        return view('backend.post.view',compact('post','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $categories =DB::table('categories')->get();
        $tags =DB::table('tags')->get();
        return view('backend.post.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $user = Auth::user()->id;

        $post->category_id = $request->category_list;
        $post->user_id = $user;
        $post->post_title = $request->post_name;
        $post->slug = Str::slug($request->post_name,'-');
        $post->post_description = $request->post_desc;
        $post->tags()->sync($request->tags);

        if($request->has('post_picture')){
            $img_url = time().'.'.$request->post_picture->getClientOriginalextension();
            // $filename = time() . '.' .$request->post_picture->getClientOriginalextension();
            $request->post_picture->move('backend/post/', $img_url);

            // $image->move('backend/post',$image);
            $post->post_photo = 'backend/post/'.$img_url;
        }

        $post->save();
        $notification = array('message' => ' Post Updated Successfully !!', 'alert-type' => 'success','timeOut' => 10000,);
        return redirect()->route('post.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    //    DB::table('posts')->where('id',$post->id)->delete();

       if($post){
        if(file_exists($post->post_photo)){
            unlink($post->post_photo);
        }
           $post->delete();
           return redirect()->route('post.index');
        }



    }
}
