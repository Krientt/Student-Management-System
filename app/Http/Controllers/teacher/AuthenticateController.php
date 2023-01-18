<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function register()
    {
        $teacher = Teacher::all();
        return view('teacher.auth.register');
    }
    public function submitRegister(Request $request)
    {
        //dd($request);//do or die
        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:teachers', //same email cannot be used by different people.
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
        return redirect()->back()->with(['success' => 'Registered successfully.']);
    }
    public function viewLogin()
    {
        if (Auth::guard('teacher')->check()) {
            return redirect()->route('teacher.dashboard');
        } else {
            return view('teacher.auth.login');
        }
    }
    public function submitLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:100'
        ]);
        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('teacher.dashboard');
        } else {
            return redirect()->back()->with(['error' => 'Email or Password do not match']);
        }
    }
}
