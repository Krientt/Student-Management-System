<?php

namespace App\Http\Controllers;

use App\Models\Teacher\Teacher;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.register');
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
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:teachers',
            'contact' => 'required|unique:teachers',
            'address' => 'required|min:3|max:50',
            'password' => 'required|min:6|max:100',
            'confirm-password' => 'required|same:password',
        ]);
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->contact = $request->contact;
        $teacher->address = $request->address;
        $password = bcrypt($request->password);
        $teacher->password = $password;
        $teacher->save();
        return redirect()->route('admin.teacher.create')->with(['success' => 'Registered successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $teachers = Teacher::paginate(5);
        return view('admin.teacher.details', compact('teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::where('id', $id)->first();
        return view('admin.teacher.edit', compact('teacher'));
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
        $teacher = Teacher::where('id', $id)->first();
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:teachers,email,' . $request->id,
            'contact' => 'required|unique:teachers,contact,' . $request->id,
            'address' => 'required|min:3|max:50',
        ]);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->contact = $request->contact;
        $teacher->address = $request->address;
        $teacher->update();
        return redirect()->route('admin.teacher.view')->with(['success' => 'Teacher Record Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::where('id', $id)->first();
        $teacher->delete();
        return back()->with(['success' => 'Teacher Record Deleted Successfully']);
    }
}
