@extends('layouts.app')

@section('content')

    <notices-manager :user="{{ auth()->user() }}"></notices-manager>

    <flash-message message="{{ session('flash') }}"></flash-message>

@endsection
