<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = Auth::user()->id;

        //user insert
        $comment = Comment::create([
           'user_id' => $user,
           'post_id' => $request->post_id,
           'comment' => $request->comment,
        ]);
        $comment->save();
        return redirect()->back();
    }


    public function UserComment(Request $request)
    {
 // return $request;
     $user = Auth::user()->id;

     //user insert
     $comment = Comment::create([
        'user_id' => $user,
        'post_id' => $request->post_id,
        'message' => $request->comment,
     ]);
     $comment->save();
     return redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {

        if($comment){
            $comment->delete();
        }

        $notification = array('message' => ' User Deleted Successfully !!', 'alert-type' => 'danger','timeOut' => 30000,);

        return redirect()->back()->with($notification);

    }
}
