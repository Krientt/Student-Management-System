<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Visitor;
use App\Models\Teacher\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
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
        return view('teacher.visitor.attendance.create', compact('visitors'));
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
            'status' => 'required',
            'date' => 'required',
        ]);
        $attendance = new Attendance();
        $attendance->visitor_id = $request->visitor_id;
        $attendance->date = $request->date;
        $attendance->status = $request->status;
        $attendance->save();
        return redirect()->route('student.attendance.create')->with(['success' => 'Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $attendances = Attendance::with('visitor')->get();
        return view('teacher.visitor.attendance.index', compact('attendances'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attendance = Attendance::where('id', $id)->first();
        $visitors = Visitor::get();
        return view('teacher.visitor.attendance.edit', compact('attendance', 'visitors'));
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
        $attendance = Attendance::where('id', $id)->first();
        $request->validate([
            'status' => 'required',
            'date' => 'required',
        ]);
        $attendance->visitor_id = $request->visitor_id;
        $attendance->date = $request->date;
        $attendance->status = $request->status;
        $attendance->update();
        return redirect()->route('student.attendance.view')->with(['success' => 'Student Record Updated Successfully']);
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
