<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\admin\Blog;
use App\Models\Frontend\Visitor;
use App\Models\Teacher\Mark;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $visitors = Visitor::get();
        $blogs = Blog::get();
        return view('teacher.marks.create', compact('visitors', 'blogs'));
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
            'terminal' => 'required',
            'remarks' => 'required',
        ]);
        $mark = new Mark();
        $mark->visitor_id = $request->visitor_id;
        $mark->terminal = $request->terminal;
        $mark->blog1_id = $request->blog1_id;
        $mark->marks1 = $request->marks1;
        $mark->blog2_id = $request->blog2_id;
        $mark->marks2 = $request->marks2;
        $mark->blog3_id = $request->blog3_id;
        $mark->marks3 = $request->marks3;
        $mark->blog4_id = $request->blog4_id;
        $mark->marks4 = $request->marks4;
        $mark->blog5_id = $request->blog5_id;
        $mark->marks5 = $request->marks5;
        $mark->remarks = $request->remarks;
        $mark->save();
        return redirect()->route('student.marks.create')->with(['success' => 'Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $marks = Mark::with('visitor', 'blog1', 'blog2', 'blog3', 'blog4', 'blog5')->get();
        return view('teacher.marks.index', compact('marks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mark = Mark::where('id', $id)->first();
        $visitors = Visitor::get();
        $blogs = Blog::get();
        return view('teacher.marks.edit', compact('mark', 'visitors', 'blogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mark = Mark::where('id', $id)->first();
        $request->validate([
            'terminal' => 'required',
            'remarks' => 'required',
        ]);
        $mark->visitor_id = $request->visitor_id;
        $mark->terminal = $request->terminal;
        $mark->blog1_id = $request->blog1_id;
        $mark->marks1 = $request->marks1;
        $mark->blog2_id = $request->blog2_id;
        $mark->marks2 = $request->marks2;
        $mark->blog3_id = $request->blog3_id;
        $mark->marks3 = $request->marks3;
        $mark->blog4_id = $request->blog4_id;
        $mark->marks4 = $request->marks4;
        $mark->blog5_id = $request->blog5_id;
        $mark->marks5 = $request->marks5;
        $mark->remarks = $request->remarks;
        $mark->update();
        return redirect()->route('student.marks.view')->with(['success' => 'Record Updated Successfully']);
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
