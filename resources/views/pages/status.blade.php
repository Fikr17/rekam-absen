@extends('layout.app')
@section('title', 'Status')

@section('content')
    <h2 class="text-center">status aktivitas</h2>
    @include('layout.components.status')
    @include('layout.components.os')
@endsection

@section('navbar-active', '/'.Request::path())