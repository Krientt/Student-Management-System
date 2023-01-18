<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use App\Models\Frontend\Like;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('admin.login.view');
    }
    public function profile()
    {
        $admin = Auth::guard('user')->user();
        return view('admin.profile', compact('admin'));
    }
    public function editProfile(Request $request)
    {
        $datas = $request->all();
        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email,' . $request->id, //same email cannot be used by different people.
            'username' => 'nullable|min:5|max:50|unique:users,username,' . $request->id,
            'bio' => 'nullable|max:300',
        ]);
        $user = User::find($request->id);
        $user->name = $datas['name'];
        $user->email = $datas['email'];
        $user->username = $datas['username'];
        $user->bio = $datas['bio'];
        if ($request->image) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,svg,gif|max:1024',
            ]);
            $extension = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->name) . time() . "." . $extension;
            $uploaded = $request->image->move(public_path('/uploads/admin_profile'), $image_name);
            if (file_exists("uploads/admin_profile/" . $user->image)) {
                unlink("uploads/admin_profile/" . $user->image);
            }
            $user->image = $image_name;
        }
        $user->update();
        return redirect()->back()->with('success', 'Profile Updated Successfully.');
    }
    public function changePassword(Request $request)
    {
        $check = Hash::check($request->current_password, Auth::guard('user')->user()->password);
        if ($check) {
            $request->validate([
                'password' => 'required|min:6|max:100',
                'confirm-password' => 'required|same:password',
            ]);
            $user = User::find(Auth::guard('user')->user()->id);
            $user->password = Hash::make($request->password);
            $user->update();
            return redirect()->back()->with('success', 'Password Changed Successfully');
        } else {
            return redirect()->back()->with('error', 'Old Password Do Not Match.');
        }
    }
    public function likes()
    {
        $likes = Like::with('blog', 'visitor')->get();
        return view('admin.enroll.index', compact('likes'));
    }
}
