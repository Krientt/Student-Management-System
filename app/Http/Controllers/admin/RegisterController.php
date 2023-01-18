<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register()
    {
        $user = User::all();
        return view('admin.auth.register');
    }
    public function submitRegister(Request $request)
    {
        //dd($request);//do or die
        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users', //same email cannot be used by different people.
            'password' => 'required|min:6|max:100',
            'confirm-password' => 'required|same:password',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $password = bcrypt($request->password);
        $user->password = $password;
        $user->save();
        return redirect()->back()->with(['success' => 'Registered successfully.']);
    }
    public function viewLogin()
    {
        if (Auth::guard('user')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.auth.login');
        }
    }
    public function submitLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:100'
        ]);
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->with(['error' => 'Email or Password do not match']);
        }
    }
}
