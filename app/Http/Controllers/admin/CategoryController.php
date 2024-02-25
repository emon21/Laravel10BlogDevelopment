<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $students = DB::table('students')->orderBy('roll','ASC')->get();

        $category = Category::orderBy('id','DESC')->get();
        return view('backend.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ////validation
        $validated = $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        $data = [
            'category_name' =>$request->category_name,
            'category_slug' =>Str::slug($request->category_name),
        ];
        // Category::create($data);
        DB::table('categories')->insert($data);
    //       $notification = array(
    //     'message' => ' Category Added Successfully !!',
    //     'alert-type' => 'success',
    //     'timeOut' => 10000,
    // );
        return redirect()->back()->with('success','Category Added Successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        // $category =Category::find($category);
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        // $this->validate($request,[
        //     'category_name' => "required|unique:categories.category_name,$request->category_name",
        // ]);

        $validated = $request->validate([
            // 'category_name' => "required|unique:categories.category_name,$request->category_name",

            'category_name' => 'required|unique:categories',
        ]);

        $category->update([
            'category_name' =>$request->category_name,
            'slug' => Str::slug($request->category_name)
        ]);

        // $category->category_name = $request->category_name;
        // $category->category_slug = Str::slug($request->category_name);
        // $category->save();

        $notification = array('message' => ' Category Updated Successfully !!', 'alert-type' => 'success','timeOut' => 30000,);
        return redirect()->route('category.index')->with($notification);



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //

        if($category){

        $category->delete();

        // $notification = array('message' => ' Category Deleted Successfully !!', 'alert-type' => 'error','timeOut' => 30000,);
        return redirect()->route('category.index');


        }
    }
}
