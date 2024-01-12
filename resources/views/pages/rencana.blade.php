@extends('layout.app')
@section('title', 'Rencana')

@section('content')
    <h1 class="text-center">Rencana</h1>
    @include('layout.components.reset')
    
@endsection

@section('navbar-active', '/'.Request::path())