<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Blog;
use App\Models\admin\Category;
use App\Models\Teacher\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('category', 'teacher')->get();
        // dd($blogs);
        return view('admin.course.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $teachers = Teacher::get();
        return view('admin.course.create', compact('categories', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:150|unique:blogs',
            'status' => 'required',
            'description' => 'required|min:25',
            'ctime' => 'required',
        ]);
        if ($request->image) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,svg,gif|max:3000',
            ]);
            $extension = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->title) . time() . "." . $extension;
            $uploaded = $request->image->move(public_path('/uploads/blogs'), $image_name);
        }
        $blog  = new Blog();
        $blog->slug = Str::slug($request->title);
        $blog->title = $request->title;
        $blog->ctime = $request->ctime;
        $blog->category_id = $request->category_id;
        $blog->teacher_id = $request->teacher_id;
        $blog->description = $request->description;
        $blog->status = $request->status;
        $blog->image = $image_name;
        $blog->user_id = Auth::guard('user')->user()->id;
        $blog->save();
        return redirect()->route('admin.blog.index')->with('success', 'Course Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
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
        return view('admin.course.edit', compact('blog', 'categories', 'teachers'));
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
            'status' => 'required',
            'description' => 'required|min:25',
            'ctime' => 'required',
        ]);
        $blog->title = $request->title;
        $blog->ctime = $request->ctime;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        $blog->teacher_id = $request->teacher_id;
        $blog->status = $request->status;
        $blog->user_id = Auth::guard('user')->user()->id;
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
        return redirect()->route('admin.blog.index')->with('success', 'Course Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if (file_exists("uploads/blogs/" . $blog->image)) {
            unlink("uploads/blogs/" . $blog->image);
        }
        $blog->delete();
        return redirect()->back()->with('success', 'Course Deleted Successfully.');
    }

    public function changeSlider($id, $show)
    {
        $count = Blog::where('show_in_slider', 1)->count();
        if ($count < 3) {
            $blog = Blog::find($id);
            if ($blog->show_in_slider == 0) {
                $blog->show_in_slider = 1;
            } else {
                $blog->show_in_slider = 0;
            }
            $blog->update();
            return response()->json(['success' => 'Slider Updated Successfully.']);
        } else {
            $blog = Blog::find($id);
            if ($blog->show_in_slider == 1) {
                $blog->show_in_slider = 0;
            } else {
                return response()->json(['success' => 'Slider Limit Reached!!']);
            }
            $blog->update();
            return response()->json(['success' => 'Slider Updated Successfully.']);
        }
        //\Session::set('success','Slider Updated Successfully');  
    }
}
