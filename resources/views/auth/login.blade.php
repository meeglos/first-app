@extends('layouts.app')

@section('content')

    <div class="w-full max-w-sm mx-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mt-8" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="username" type="text" placeholder="Username">
                <p class="text-red text-xs italic">Please enter a valid username.</p>
            </div>
            <div class="mb-6">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="password" placeholder="******************">
                <p class="text-red text-xs italic">Please enter you password.</p>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-red hover:bg-red-dark text-white font-bold py-2 px-4 rounded" type="submit">
                    Sign In
                </button>
                <a class="inline-block align-center font-bold text-sm text-blue hover:text-blue-darker" href="{{ url('/password/reset') }}">
                    Forgot Password?
                </a>
            </div>
        </form>
        <p class="text-center text-grey text-xs">
            ©2018 Codde-it Inc. All rights reserved.
        </p>
    </div>

@endsection
