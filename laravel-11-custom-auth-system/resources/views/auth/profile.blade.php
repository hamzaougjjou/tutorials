@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<section class="min-h-[calc(100vh-100px)] flex items-center justify-center">

    <div class="max-w-md w-full bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Profile Information</h1>

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm --
                px-2 py-3 border-black border-2 outline-none
                " readonly>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm --
                px-2 py-3 border-black border-2 outline-none
                " readonly>
        </div>
        @auth
            @if (!auth()->user()->email_verified_at)
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Send Verification Email
                    </button>
                </form>
            @else
                <p class="text-green-600 font-bold text-end">
                    you email was verified
                </p>
            @endif
        @endauth
    </div>
</section>
@endsection