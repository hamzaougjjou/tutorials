@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="h-[calc(100vh-60px)] flex flex-wrap items-center justify-center w-full">
    <div class="max-w-md w-full">
        <form method="POST" action="{{ route('register.store') }}"
            class="max-w-md md:ml-auto w-full border-2 border-white p-4 shadow-lg rounded-md">
            @csrf

            <h3 class="text-gray-800 text-3xl font-extrabold mb-8">
                Create New Account
            </h3>

            <div class="space-y-4">
                <!-- Name -->
                <div>
                    <input name="name" type="text" autocomplete="name" required
                        class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-none focus:border-2 border-gray-900"
                        placeholder="Full Name" value="{{ old('name') }}" />
                    @Error('name')
                        <p class="text-[10px] text-red-600 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <input name="email" type="email" autocomplete="email" required
                        class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-none focus:border-2 border-gray-900"
                        placeholder="Email ..." value="{{ old('email') }}" />
                    @error('email')
                        <p class="text-[10px] text-red-600 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <input name="password" type="password" autocomplete="new-password" required
                        class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-none focus:border-2 border-gray-900"
                        placeholder="Password" />
                    @error('password')
                        <p class="text-[10px] text-red-600 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <input name="password_confirmation" type="password" autocomplete="new-password" required
                        class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-none focus:border-2 border-gray-900"
                        placeholder="Confirm Password" />
                    @error('password_confirmation')
                        <p class="text-[10px] text-red-600 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <!-- <div class="flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-2">
                        <input id="remember-me" name="remember" type="checkbox"
                            class="h-4 w-4 text-blue-600 border-gray-300 rounded outline-none" />
                        <label for="remember-me" class="ml-3 block text-sm text-gray-800">تذكرني</label>
                    </div>
                </div> -->
            </div>

            <!-- Register Button -->
            <div class="mt-8">
                <button type="submit"
                    class="w-full inline-block text-center shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
@endsection