<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function register()
    {
        return view('auth.register');
    }

    public function register_store(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //تسجيل الدخول للمستخدم
        Auth::login($user);

        // Send email verification link
        $user->sendEmailVerificationNotification();

        //توجيه المستخدم الي  ملفه الشخصي
        return redirect()->route('profile')->with('success', 'Registration successful! Welcome.');
    }


    public function login(Request $request)
    {
        return view('auth.login');
    }
    public function login_store(LoginRequest $request)
    {
        // محاولة التحقق من بيانات تسجيل الدخول باستخدام البريد الإلكتروني وكلمة المرور
        if (Auth::attempt($request->only('email', 'password'))) {
            // إذا تم تسجيل الدخول بنجاح
            $request->session()->regenerate(); // تجديد الجلسة لمنع هجمات "تثبيت الجلسات"

            // إعادة توجيه المستخدم إلى الصفحة المطلوبة أو لوحة التحكم
            return redirect()->route(route: 'profile')->with('success', 'Registration successful! Welcome.');
        }

        // إذا كانت بيانات الاعتماد خاطئة
        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.', // رسالة الخطأ لحقل البريد الإلكتروني
        ])->onlyInput('email'); // إبقاء حقل البريد الإلكتروني معبأً عند إعادة المحاولة
    }


    public function logout()
    {
        //session تسجيل الخروج و حدف 
        Auth::logout();

        // توجيه المستخدم الى الصفحة الرئيسية
        return redirect()->route('home')->with('success', 'You have been logged out successfully.');
    }


}