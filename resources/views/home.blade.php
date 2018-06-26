@extends('layouts.app')

@section('content')

    <comments-manager :user="{{ auth()->user() }}"></comments-manager>

    <flash-message message="{{ session('flash') }}"></flash-message>

@endsection
