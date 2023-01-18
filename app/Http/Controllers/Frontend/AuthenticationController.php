<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    public function register()
    {
        $user = Visitor::all();
        return view('frontend.auth.register');
    }
    public function submitRegister(Request $request)
    {
        //dd($request);//do or die
        DB::beginTransaction();
        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'Parents_Name' => 'required|min:3|max:50',
            'Class' => 'required',
            'email' => 'required|email|unique:visitors', //same email cannot be used by different people.
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
        $saved = $visitor->save();
        if ($saved) {
            $this->sendVerificationMail($visitor);
        }
        DB::commit();
        return redirect()->back()->with(['success' => 'Registered successfully. Please check your mail for verification']);
    }
    public function sendVerificationMail($visitor)
    {
        $visitor = Visitor::where('id', $visitor->id)->first();
        $visitor->verify_token = Str::random(80);
        $visitor->token_expiry = Carbon::now();
        $visitor->update();
        $data = [
            'token' => $visitor->verify_token,
            'email' => $visitor->email,
        ];
        Mail::send('frontend.auth.verify-mail', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject('Email Verification');
        });
    }
    public function verifyEmail($token)
    {
        //dd($token);
        $visitor = Visitor::where('verify_token', $token)->first();
        $visitor->verify_token = null;
        $visitor->token_expiry = null;
        $visitor->email_verified_at = Carbon::now();
        $visitor->update();
        return redirect()->route('frontend.login.view')->with('success', 'Email Verified Successfully.');
    }
    public function resendCode()
    {
        return view('frontend.auth.resend-code');
    }
    public function resendCodeSubmit(Request $request)
    {
        $visitor = Visitor::where('email', $request->email)->first();
        $this->sendVerificationMail($visitor);
        return redirect()->back()->with(['success' => 'Please check your mail for verification']);
    }
    public function viewLogin()
    {
        if (Auth::guard('visitor')->check()) {
            return redirect()->route('frontend.home');
        } else {
            return view('frontend.auth.login');
        }
    }
    public function submitLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:100'
        ]);
        $visitor = Visitor::where('email', $request->email)->first();
        if (Auth::guard('visitor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (is_null($visitor->email_verified_at)) {
                return redirect()->back()->with(['error' => 'Email not verified']);
            }else{
                return redirect()->route('frontend.home');
            }
        } else {
            return redirect()->back()->with(['error' => 'Email or Password do not match']);
        }
    }
    public function modalLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:100'
        ]);
        $visitor = Visitor::where('email', $request->email)->first();
        if (Auth::guard('visitor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (is_null($visitor->email_verified_at)) {
                return redirect()->back()->with(['error' => 'Email not verified']);
            }else{
                return redirect()->route('frontend.home');
            }
        } else {
            return redirect()->back()->with(['error' => 'Email or Password do not match']);
        }
    }
    public function logout()
    {
        Auth::guard('visitor')->logout();
        // Session::flush();
        return redirect()->route('frontend.home');
    }
}
