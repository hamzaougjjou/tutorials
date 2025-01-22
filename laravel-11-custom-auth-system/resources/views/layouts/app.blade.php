<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="bg-green-100 p-4">
        <div class="max-w-[1500px] mx-auto flex justify-between">
            <a href="/" class="text-2xl font-bold">App Name</a>
            <nav>
                <ul class="flex space-x-4">
                    @auth
                        <li>
                            <a href="{{ route('profile') }}" class="font-bold hover:text-blue-600">
                                {{ auth()->user()->name }}
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="font-bold hover:text-blue-600">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                    @guest
                        @if (Route::currentRouteName() !== 'login')
                            <li>
                                <a href="{{ route('login') }}" class="font-bold hover:text-blue-600">
                                    Login
                                </a>
                            </li>
                        @endif

                        @if (Route::currentRouteName() !== 'register')
                            <li>
                                <a href="{{ route('register') }}" class="font-bold hover:text-blue-600">
                                    Register
                                </a>
                            </li>
                        @endif
                    @endguest

                </ul>
            </nav>
        </div>
    </header>
    <main class="max-w-[1200px] mx-auto py-4 bg-gray-50 min-h-[calc(100vh-70px)]">
        @yield('content')
    </main>
</body>

</html>