@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4">Verify Your Email Address</h2>
        <p class="mb-4">A verification link has been sent to your email address. Please click the link to verify your
            email.</p>
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Resend Verification Email
            </button>
        </form>
    </div>
</div>

@endsection