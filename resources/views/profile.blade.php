@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto flex items-center">
            <img class="w-32 h-32 rounded-full mr-4 float-left" src="/uploads/avatars/{{ $user->avatar }}">
            <div class="text-3xl">
                <p class="text-black leading-none">{{ $user->name }}s Profile</p>
                <p class="text-grey-dark text-base text-right">{{ $user->email }}</p>
            </div>
            <form action="/profile" method="POST" enctype="multipart/form-data">
                <label for="avatar">Update profile image</label>
                <input type="file" name="avatar" class="appearance-none">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" value="Upload" class="pull-right btn btn-sm">
            </form>
        </div>
    </div>
@endsection
