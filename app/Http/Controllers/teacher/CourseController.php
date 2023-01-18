<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\admin\Blog;
use App\Models\admin\Category;
use App\Models\Teacher\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('category', 'teacher')->where('teacher_id', Auth::guard('teacher')->user()->id)->get();
        // dd($blogs);
        return view('teacher.course.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categories = Category::get();
        $teachers = Teacher::get();
        return view('teacher.course.edit', compact('blog', 'categories', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|min:3|max:150|unique:blogs,title,' . $blog->id,
            'description' => 'required|min:25',
            'ctime' => 'required',
        ]);
        $blog->title = $request->title;
        $blog->ctime = $request->ctime;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        if ($request->image) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,svg,gif|max:3000',
            ]);
            $extension = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->title) . time() . "." . $extension;
            $uploaded = $request->image->move(public_path('/uploads/blogs'), $image_name);
            if (file_exists("uploads/blogs/" . $blog->image)) {
                unlink("uploads/blogs/" . $blog->image);
            }
            $blog->image = $image_name;
        }
        $blog->update();
        return redirect()->route('teacher.course.index')->with('success', 'Course Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
