<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Detail::get();
        return view('admin.about.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            'title' => 'required|unique:details',
            'quote' => 'required|min:100',
            'history' => 'required|min:100',
            'detail' => 'required|min:100',
            'contact' => 'required',
            'email' => 'required|email',
            'status' => 'required',
        ]);
        if ($request->image) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,svg,gif|max:3000',
            ]);
            $extension = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->title) . time() . "." . $extension;
            $uploaded = $request->image->move(public_path('/uploads/details'), $image_name);
        }
        $detail = new Detail();
        $detail->title = $request->title;
        $detail->quote = $request->quote;
        $detail->history = $request->history;
        $detail->detail = $request->detail;
        $detail->contact = $request->contact;
        $detail->image = $image_name;
        $detail->email = $request->email;
        $detail->status = $request->status;
        $detail->save();
        return redirect()->route('admin.details.create')->with(['success' => 'Added successfully.']);
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
    public function edit(Detail $detail)
    {
        return view('admin.about.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        $request->validate([
            'title' => 'required|unique:details,title,' . $detail->id,
            'quote' => 'required|min:100',
            'history' => 'required|min:100',
            'detail' => 'required|min:100',
            'contact' => 'required',
            'email' => 'required|email',
            'status' => 'required',
        ]);
        $detail->title = $request->title;
        $detail->quote = $request->quote;
        $detail->history = $request->history;
        $detail->detail = $request->detail;
        $detail->contact = $request->contact;
        $detail->email = $request->email;
        $detail->status = $request->status;
        if ($request->image) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,svg,gif|max:3000',
            ]);
            $extension = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->title) . time() . "." . $extension;
            $uploaded = $request->image->move(public_path('/uploads/details'), $image_name);
            if (file_exists("uploads/details/" . $detail->image)) {
                unlink("uploads/details/" . $detail->image);
            }
            $detail->image = $image_name;
        }
        $detail->update();
        return redirect()->route('admin.details.index')->with(['success' => 'Record Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        if (file_exists("uploads/details/" . $detail->image)) {
            unlink("uploads/details/" . $detail->image);
        }
        $detail->delete();
        return redirect()->back()->with('success', 'Record Deleted Successfully.');
    }
}
