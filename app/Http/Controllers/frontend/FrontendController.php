<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index()
     {
        $post = Post::with('category','user')->orderBy('created_at','DESC')->take(5)->get();

        // return $post->category;
        $postsFirst = $post->splice(0,2);
        $postsMiddle = $post->splice(0,1);
        $postsLast = $post->splice(0);

        $FooterPost = Post::with('category','user')->orderBy('created_at','DESC')->inRandomOrder()->limit(5)->get();
        $footerpostsFirst = $FooterPost->splice(0,1);
        $footerpostsMiddle = $FooterPost->splice(0,2);
        $footerpostsLast = $FooterPost->splice(0,1);

        $recentPost = Post::with('category','user')->orderBy('created_at','DESC')->inRandomOrder()->limit(9)->get();
        // return $recentPost;
        return view('frontend.website',compact('recentPost','postsFirst','postsMiddle','postsLast','footerpostsFirst','footerpostsMiddle','footerpostsLast'));
    }



    //about
    public function about()
    {
      $user = User::first();
    //   $teams = Team::all();
      return view('frontend.about',compact('user'));
    }

    //Blog LIst
    public function blog(Request $request)
    {

     //$categoryList = Category::all();
     $categoryList = Category::withCount('posts')->get();
     $tag = Tag::all();

      $query =  Post::query();
      $search = $request->search;
      $query->whereHas('category', function($q) use($search) {
         $q->where('category_name', 'like', "%$search%");
      })->orWhere('post_title', 'like', "%$search%");
      $postLists  = $query->withCount('category')->get();
      $blogs = $query->paginate('10');

       return view('frontend.blog',compact('postLists','tag','categoryList','blogs'));

    }


    public function category($slug)
    {
        $category =Category::where('category_slug',$slug)->first();
        // return $posts;
        if($category){
            $posts = Post::with('category')->where('category_id',$category->id)->get();
            return view('frontend.category',compact(['category','posts']));
        }
        else{
            return redirect()->route('website');
        }
    }


    //category
    public function CategoryList()
    {
      //"select * from post where date";
      $categoryList = Category::withCount('posts')->get();
    //   return $categoryList;
      $posts = Post::where('created_at','!=',null)->get();
    //return $posts->count();
    // where('created_at','2022-06-23 09:59:33') return $categoryList;
      return view('frontend.categorylist',compact('categoryList','posts'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function post($slug)
    {


        $post = Post::with('user','category','comments')->where('slug',$slug)->first();
        //random data show
        // return $post;
        $posts = Post::with('user','category')->inRandomOrder()->limit(3)->get();

        $comment = Comment::with('user','post')->where('post_id',$post->id)->get();

        // return $comment;

        //more related category post
        $relatedpost = Post::orderBy('category_id','DESC')->take(4)->inRandomOrder()->get();
        $relatedpostft = $relatedpost->splice(0,1);
        $relatedpostml = $relatedpost->splice(0,2);
        $relatedpostlt = $relatedpost->splice(0,1);

        $tags = Tag::all();
         $categoryList = Category::withCount('posts')->get();
        // return $categoryList;
        // $category =Category::where('category_slug',$slug)->first();
        // if($category){

        //     $postlist = Post::with('category')->where('category_id',$category->id)->get();

        // }


        if($post){
            return view('frontend.singlepost',compact('post','posts','tags','relatedpostft','relatedpostml','relatedpostlt','comment','categoryList'));
        }
        else{
            return redirect('/');
        }
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug',$slug)->first();
        if($tag){
            $posts = $tag->posts()->orderBy('created_at','DESC')->get();
            // return $posts;
            // $posts = Post::with('category')->where('category_id',$tag->id)->get();
            return view('frontend.tag',compact(['tag','posts']));
        }
        else{
            return redirect()->route('website');
        }
    }
}
