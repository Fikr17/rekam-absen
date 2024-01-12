@extends('layout.app')
@section('title', 'Rekam')

@section('content')
    <h1 class="text-center">rekam</h1>
    @include('layout.components.rekam')
@endsection

@section('navbar-active', '/'.Request::path())