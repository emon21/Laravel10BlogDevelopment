<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function user()
     {
        // $post = Post::with('category','user')->orderBy('created_at','DESC')->take(5)->get();

        // $FooterPost = Post::with('category','user')->orderBy('created_at','DESC')->inRandomOrder()->limit(5)->get();

        $recentPost = Post::with('category','user')->orderBy('created_at','DESC')->where('user_id',1)->inRandomOrder()->paginate(12);

        return view('frontend.user.post',compact('recentPost'));
    }
    public function InserPost()
    {
      $tags = Tag::all();
      $categories = Category::all();

      return view('frontend.user.post.create',compact('tags','categories'));
    }
    public function CreatePost()
    {
      $tags = Tag::all();
      $categories = Category::all();

      return view('frontend.user.post.create',compact('tags','categories'));
    }
    public function StorePost(Request $request)
    {
      $tags = Tag::all();
      $categories = Category::all();
    //   $post = new Post();

      $user = Auth::user()->id;

      $post = Post::create([
        'category_id' => $request->category_list,
        'user_id' => $user,
        'post_title' => $request->post_name,
        'slug' =>  Str::slug($request->post_name,'-'),
        'post_description' => $request->post_desc,
        'status' => $request->status,
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
    return redirect()->route('user.post')->with($notification);


    //   return view('frontend.user.post.create',compact('tags','categories'));
    }
    public function PostList()
    {
      $tags = Tag::all();
      $categories = Category::all();

      return view('frontend.user.post.create',compact('tags','categories'));
    }

    public function PostView($slug)
    {
        $post = Post::where('slug',$slug)->first();
        // return $post;
      $tags = Tag::all();
      $categories = Category::all();

      return view('frontend.user.post.view',compact('tags','categories','post'));
    }

    public function PostEdit(Post $post)
    {
        // $post = Post::where('id',$post)->first();
        // return $post;
      $tags = Tag::all();
      $categories = Category::all();

      return view('frontend.user.post.edit',compact('tags','categories','post'));
    }
    public function PostUpdate(Request $request,Post $post)
    {
         $user = Auth::user()->id;
        //  $post->category_id = $request->category_list;
        //  $post->user_id = $user;
        //  $post->post_title = $request->post_name;
        //  $post->slug = Str::slug($request->post_name,'-');
        //  $post->post_description = $request->post_desc;


         $post->category_id = $request->category_list;
        $post->user_id = $user;
        $post->post_title = $request->post_title;
        $post->slug = Str::slug($request->post_title,'-');
        $post->post_description = $request->post_desc;


         //multiple data update
        $post->tags()->sync($request->tags);


        if($request->hasFile('post_picture')){
            $img_url = time().'.'.$request->post_picture->getClientOriginalextension();
            $request->post_picture->move('backend/post/', $img_url);
            // $request->post_picture->move(public_path('backend/post/'), $img_url);
            $post->post_photo = 'backend/post/'.$img_url;
        }

        $post->save();
        $notification = array('message' => ' Post Update Successfully !!', 'alert-type' => 'success','timeOut' => 30000,);
        return redirect()->route('user.post')->with($notification);


    //   return view('frontend.user.post.create',compact('tags','categories'));
    }
    public function PostDelete(Post $post)
    {
        // return $post;

        //delete File
        if(file_exists($post->post_photo)){
            unlink($post->post_photo);
            $post->delete();
            }
        $notification = array('message' => ' Post Update Successfully !!', 'alert-type' => 'success','timeOut' => 30000,);
        return redirect()->route('user.post')->with($notification);
    }


    /* ======================= User Profile Start =========================  */

        public function UserProfile(){
            $user = Auth::user();
            return view('frontend.user.profile',compact('user'));

        }

        public function UserUpdateProfile(Request $request)
        {

            $user = Auth::user();

            //validation
            $this->validate($request,[
                'name' => 'required',
                'email' => "sometimes|email|unique:users,email,$user->id",
                'password' => 'sometimes|nullable|min:8',
                'image' => 'sometimes|nullable|image|max:2048',
            ]);

             //user data save
            $user->name = $request->name;
            $user->email = $request->email;
            $user->description = $request->desc;

            //Changed User Password
            if ($request->has('password') && $request->password !== null) {
                $user->password = bcrypt($request->password);

            }

            //User Profile Change
            if($request->hasFile('user_picture')) {
                //delete File
                if(file_exists($user->image)){
                    unlink($user->image);
                    }
                //file upload
                $filename = time() . '.' .$request->user_picture->getClientOriginalextension();
                $request->user_picture->move(public_path('backend/user/'), $filename);
                $user->image = 'backend/user/'.$filename;
            }

            $user->save();
            Session::flash('update','User Profile Changed Successfully');
            return redirect()->route('user.UserProfile');


        }







    /* ======================= User Profile End =========================  */

    public function index()
    {
        $user = User::latest()->paginate(10);
        return view('backend.user.index',compact('user'));

    }

    /*
    create method
    */

    public function create()
    {
        return view('backend.user.create');

    }


    /*
    store method
    */

    public function store(Request $request)
    {

        $this->validate($request,
        [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            // 'description' => $request->description,
            'role_as' => $request->user_role
        ]);

        $notification = array('message' => ' User Created Successfully !!', 'alert-type' => 'success','timeOut' => 30000,);

        // return view('backend.user.index');
        return redirect()->route('user.index')->with($notification);


    }


    /*
    show method
    */

    public function show(User $user)
    {
        // return $user;
        return view('backend.user.view',compact('user'));

    }


    /*
    edit method
    */

    public function edit(User $user)
    {
        // return $user;
        return view('backend.user.edit',compact('user'));

    }


    /*
    update method
    */

    public function update(Request $request,User $user)
    {

        // $this->validate($request,
        // [
        //     'name' => 'required|string',
        //     'email' => 'required|string|unique:users,email',
        //     'password' => 'sometimes|nullable|min:8',

        // ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_as = $request->user_role;
        $user->save();

        $notification = array('message' => ' User Updated Successfully !!', 'alert-type' => 'success','timeOut' => 30000,);
        // return view('backend.');
        return redirect()->route('user.index')->with($notification);

    }


    /*
    destroy method
    */

    public function destroy(User $user)
    {

        if($user){
            $user->delete();
        }

        $notification = array('message' => ' User Deleted Successfully !!', 'alert-type' => 'danger','timeOut' => 30000,);

        return redirect()->with($notification);

    }


    /*
    profile method
    */

    public function profile(User $user)
    {
        $user = Auth()->user();
        return view('backend.user.profile',compact('user'));


    }
    public function updateprofile(Request $request)
    {
        // return $user;
        $user = Auth()->user();

        // $this->validate($request,
        // [
        //     'name' => 'required|string',
        //     'email' => 'required|string|unique:users,email',
        //     'password' => 'sometimes|nullable|min:8',
        //     'image' => 'sometimes|nullable|image|max:2048',

        // ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;

        if($request->has('password') && $request->password !== null){
            $user->password = bcrypt($request->password);
        }

        // if($request->hasFile('image')){
        //     $image = $request->image;
        //     $img_url = time().'.'.$image->getClientOriginalextension();
        //     $image->move('backend/profile/', $img_url);
        //     $user->image = 'backend/profile/'.$img_url;
        // }

        if($request->hasFile('image')) {
            //delete File
            if(file_exists($user->image)){
               unlink($user->image);
               }
            //file upload
            $img_url = time() . '.' .$request->image->getClientOriginalextension();
            $request->image->move(public_path('backend/user/'), $img_url);
            $user->image = 'backend/user/'.$img_url;
         }

        $user->save();

        $notification = array('message' => ' User Updated Successfully !!', 'alert-type' => 'success','timeOut' => 30000,);
        return redirect()->back();


    }

    public function PasswordChange(){

        return view('frontend.user.changepassword');

    }

    public function UpdatePassword(Request $request){

        //  $request->validate([
        //     'current_password' => 'required',
        //     'password' => 'required|min:8|string|confirmed',
        //     // 'confirm_password' => 'required',
        // ]);

        // $request->validate([
        //     'old_password' => 'required',
        //     'password' => ['required', 'string', 'min:8', 'confirmed']
        // ]);

        // $request->validate([
        //     'current_password' => ['required','string','min:8'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed']
        // ]);

         $user = Auth::user();
        //  return $user;

        // if(Hash::check($request->current_password,$user->password)){

        //     $user->password=Hash::make($request->password); //hashing password
        //     $user->save();
        //     return redirect()->back()->with('success','Change Password Successfully!!');

        // }
        // else{
        //     return redirect()->back()->with('error','Current Password Do Not Match');
        // }



        // $currentPasswordStatus = );
        // if(Hash::check($request->old_password, $user->password)){


        //     DB::table('users')->where('id',$user->id);

        //     // User::findOrFail(Auth::user()->id)->update([
        //     //     'password' => Hash::make($request->password),
        //     // ]);

        //     return redirect()->back()->with('success','Password Updated Successfully');

        // }else{

        //     return redirect()->back()->with('error','Current Password does not match with Old Password');
        // }

        $check = Hash::check($request->current_password, $user->password);
        if ($check) {

            User::find(Auth::user()->id)->update([
               'password' => bcrypt($request->password),
            ]);
            // $user->password = Hash::make($request->password);
            // $user->save();
            return redirect()->back()->with('success','password has been cheanged...!!');
        }
        else{

            return redirect()->back()->with('error','Your Old Password does Not Match With Our Records...!!');

        }

    }
}
