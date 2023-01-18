<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::get();
        return view('admin.notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
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
            'title' => 'required|unique:notices',
            'detail' => 'required|min:100',
        ]);
        if ($request->image) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,svg,gif|max:3000',
            ]);
            $extension = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->title) . time() . "." . $extension;
            $uploaded = $request->image->move(public_path('/uploads/notices'), $image_name);
        }
        $notice = new Notice();
        $notice->title = $request->title;
        $notice->detail = $request->detail;
        $notice->image = $image_name;
        $notice->save();
        return redirect()->route('admin.notices.create')->with(['success' => 'Added successfully.']);
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
    public function edit(Notice $notice)
    {
        return view('admin.notice.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required|unique:notices,title,' . $notice->id,
            'detail' => 'required|min:100',
        ]);
        $notice->title = $request->title;
        $notice->detail = $request->detail;
        if ($request->image) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,svg,gif|max:3000',
            ]);
            $extension = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->title) . time() . "." . $extension;
            $uploaded = $request->image->move(public_path('/uploads/notices'), $image_name);
            if (file_exists("uploads/notices/" . $notice->image)) {
                unlink("uploads/notices/" . $notice->image);
            }
            $notice->image = $image_name;
        }
        $notice->update();
        return redirect()->route('admin.notices.index')->with(['success' => 'Record Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        if (file_exists("uploads/notices/" . $notice->image)) {
            unlink("uploads/notices/" . $notice->image);
        }
        $notice->delete();
        return redirect()->back()->with('success', 'Record Deleted Successfully.');
    }
}
