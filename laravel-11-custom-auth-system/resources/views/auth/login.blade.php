@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="h-[calc(100vh-60px)] flex flex-wrap items-center justify-center w-full">
    <div class="max-w-md w-full">
        <form method="POST" action="{{ route('login.store') }}" class="md:ml-auto w-full border-2 border-white p-4 
                        shadow-lg bg-white
                        rounded-md block">
            @csrf
            <h3 class="text-gray-800 text-3xl font-extrabold mb-8">
                Login Page
            </h3>

            <div class="space-y-4">
                <div>
                    <input
                        class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-none border border-[#ffffff00] focus:border-gray-300"
                        placeholder="Email ..." type="email" name="email" value="{{ old('email') }}"  required id="email"
                        autofocus autocomplete="username" />
                    @error('email')
                        <p class="text-[10px] text-red-600 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <input name="password" type="password" autocomplete="current-password" required
                        class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-none focus:bg/8 border  border-[#ffffff00] focus:border-gray-300"
                        placeholder="Password ..." autocomplete="current-password" />
                    @error('password')
                        <p class="text-[10px] text-red-600 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                <div class="flex flex-wrap items-center justify-between gap-4">

                    <label for="remember_me" class="flex items-center gap-1">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <label for="remember-me" class="ml-3 block text-sm text-gray-800">Remember Me</label>
                    </label>

                    <div class="text-sm">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-blue-600 hover:text-blue-500 font-semibold">
                                Forgot Password
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="!mt-8">
                <button type="submit"
                    class="w-full inline-block
                text-center
                shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
@endsection