<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true; // السماح بتنفيذ الطلب لجميع المستخدمين
    }

    public function rules()
    {
        return [
            'email' => 'required|email', // البريد الإلكتروني يجب أن يكون موجودًا وبصيغة صحيحة
            'password' => 'required|min:6', // كلمة المرور يجب أن تكون موجودة ولا تقل عن 6 أحرف
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters long.',
        ];
    }
}
