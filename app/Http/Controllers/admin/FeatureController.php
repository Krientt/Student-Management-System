<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::get();
        return view('admin.feature.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feature.create');
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
            'title' => 'required|unique:features',
            'detail' => 'required|min:100',
            'show_in_home' => 'required',
        ]);
        if ($request->image) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,svg,gif|max:3000',
            ]);
            $extension = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->title) . time() . "." . $extension;
            $uploaded = $request->image->move(public_path('/uploads/features'), $image_name);
        }
        $feature = new Feature();
        $feature->title = $request->title;
        $feature->detail = $request->detail;
        $feature->image = $image_name;
        $feature->show_in_home  = $request->show_in_home;
        $feature->save();
        return redirect()->route('admin.features.create')->with(['success' => 'Added successfully.']);
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
    public function edit(Feature $feature)
    {
        return view('admin.feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'title' => 'required|unique:features,title,' . $feature->id,
            'detail' => 'required|min:100',
            'show_in_home' => 'required',
        ]);
        $feature->title = $request->title;
        $feature->detail = $request->detail;
        $feature->show_in_home  = $request->show_in_home;
        if ($request->image) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,svg,gif|max:3000',
            ]);
            $extension = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->title) . time() . "." . $extension;
            $uploaded = $request->image->move(public_path('/uploads/features'), $image_name);
            if (file_exists("uploads/features/" . $feature->image)) {
                unlink("uploads/features/" . $feature->image);
            }
            $feature->image = $image_name;
        }
        $feature->update();
        return redirect()->route('admin.features.index')->with(['success' => 'Record Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        if (file_exists("uploads/features/" . $feature->image)) {
            unlink("uploads/features/" . $feature->image);
        }
        $feature->delete();
        return redirect()->back()->with('success', 'Record Deleted Successfully.');
    }
}
