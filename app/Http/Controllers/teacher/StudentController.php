<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Visitor;
use Illuminate\Http\Request;

class StudentController extends Controller
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
        return view('teacher.visitor.create');
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
            'Parents_Name' => 'required|min:3|max:50',
            'Class' => 'required',
            'email' => 'required|email|unique:visitors',
            'Phone_Number' => 'required|unique:visitors',
            'password' => 'required|min:6|max:100',
            'confirm-password' => 'required|same:password',
        ]);
        $visitor = new Visitor();
        $visitor->name = $request->name;
        $visitor->Parents_Name = $request->Parents_Name;
        $visitor->Class = $request->Class;
        $visitor->email = $request->email;
        $visitor->Phone_Number = $request->Phone_Number;
        $password = bcrypt($request->password);
        $visitor->password = $password;
        $visitor->save();
        return redirect()->route('teacher.student.create')->with(['success' => 'Registered successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $visitors = Visitor::paginate(5);
        return view('teacher.visitor.index', compact('visitors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visitor = Visitor::where('id', $id)->first();
        return view('teacher.visitor.edit', compact('visitor'));
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
        $visitor = Visitor::where('id', $id)->first();
        $request->validate([
            'name' => 'required|min:3|max:50',
            'Parents_Name' => 'required|min:3|max:50',
            'Class' => 'required',
            'email' => 'required|email|unique:visitors,email,' . $request->id,
            'Phone_Number' => 'required|unique:visitors,Phone_Number,' . $request->id,
        ]);
        $visitor->name = $request->name;
        $visitor->Parents_Name = $request->Parents_Name;
        $visitor->Class = $request->Class;
        $visitor->email = $request->email;
        $visitor->Phone_Number = $request->Phone_Number;
        $visitor->update();
        return redirect()->route('teacher.student.view')->with(['success' => 'Student Record Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitor = Visitor::where('id', $id)->first();
        $visitor->delete();
        return back()->with(['success' => 'Student Record Deleted Successfully']);
    }
}
