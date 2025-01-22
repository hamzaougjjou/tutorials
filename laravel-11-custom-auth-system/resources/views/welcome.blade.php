@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<h1 class="text-3xl font-bold mb-4 text-center">HOME PAGE!


</h1>
@auth
    <span class="block text-blue-600 text-3xl font-bold text-center">Welcom
        {{auth()->user()->name }}
    </span>
@endauth
@endsection