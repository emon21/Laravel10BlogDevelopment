<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class TagController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tags = Tag::orderBy('id','DESC')->get();
        return view('backend.tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.tag.index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Tag $tag)
    {

        // return dd($request->all());
       ////validation
    //    $validated = $request->validate([
    //     'name' => 'required|unique:tags,name',
    // ]);

    // $this->validate($request,[
    //     'name' => 'required|unique:tags,name',
    // ]);


    $tag->create([
        'name' =>$request->tag_name,
        'slug' =>Str::slug($request->tag_name,'-'),
        // 'description' =>$request->category_name,
    ]);

    // $tag->name = $request->tag_name;
    // $tag->slug = Str::slug($request->tag_name,'-');
    // // $tag->post_description = $request->post_description;
    // // // $post->post_photo = $request->post_photo;
    // // $tag->status = $request->status;
    // $tag->save();



    // $data = [
    //     'name' =>$request->tag_name,
    //     'slug' =>Str::slug($request->tag_name),
    // ];
    // // Category::create($data);
    // DB::table('tags')->insert($data);

    $notification = array(
        'message' => ' Tag Added Successfully !!','alert-type' => 'success','timeOut' => 10000,
    );
      return redirect()->route('tag.index')->with($notification);



    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
        // return view('backend.tag.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //

        return view('backend.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        //
       
        $tag->name = $request->tag_name;
        $tag->slug = Str::slug($request->tag_name,'-');
        $tag->save();

        $notification = array(
            'message' => ' Tag Updated Successfully !!','alert-type' => 'success','timeOut' => 10000,
        );
          return redirect()->route('tag.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
        if($tag){
            $tag->delete();
            return redirect()->route('tag.index');
       }



    }
}
