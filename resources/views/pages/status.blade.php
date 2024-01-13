@extends('layout.app')
@section('title', 'Status')

@section('content')
    <h2 class="text-center">status aktivitas</h2>
    @include('layout.components.status')
@endsection

@section('navbar-active', '/'.Request::path())