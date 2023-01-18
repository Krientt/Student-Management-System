<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function dashboard()
    {
        return view('teacher.dashboard');
    }
    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.login.view');
    }
    public function profile()
    {
        $teacher = Auth::guard('teacher')->user();
        return view('teacher.profile', compact('teacher'));
    }
    public function editProfile(Request $request)
    {
        $datas = $request->all();
        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:teachers,email,' . $request->id, //same email cannot be used by different people.
            'username' => 'nullable|min:5|max:50|unique:teachers,username,' . $request->id,
            'bio' => 'nullable|max:300',
            'contact' => 'nullable',
            'address' => 'nullable|max:300',
        ]);
        $teacher = Teacher::find($request->id);
        $teacher->name = $datas['name'];
        $teacher->email = $datas['email'];
        $teacher->username = $datas['username'];
        $teacher->bio = $datas['bio'];
        $teacher->contact = $datas['contact'];
        $teacher->address = $datas['address'];
        if ($request->image) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,svg,gif|max:1024',
            ]);
            $extension = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->name) . time() . "." . $extension;
            $uploaded = $request->image->move(public_path('/uploads/teacher_profile'), $image_name);
            if (file_exists("uploads/teacher_profile/" . $teacher->image)) {
                unlink("uploads/teacher_profile/" . $teacher->image);
            }
            $teacher->image = $image_name;
        }
        $teacher->update();
        return redirect()->back()->with('success', 'Profile Updated Successfully.');
    }
    public function changePassword(Request $request)
    {
        $check = Hash::check($request->current_password, Auth::guard('teacher')->user()->password);
        if ($check) {
            $request->validate([
                'password' => 'required|min:6|max:100',
                'confirm-password' => 'required|same:password',
            ]);
            $teacher = Teacher::find(Auth::guard('teacher')->user()->id);
            $teacher->password = Hash::make($request->password);
            $teacher->update();
            return redirect()->back()->with('success', 'Password Changed Successfully');
        } else {
            return redirect()->back()->with('error', 'Old Password Do Not Match.');
        }
    }
}
