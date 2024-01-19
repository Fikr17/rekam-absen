@extends('layout.app')
@section('title', 'Rekam')

@section('content')
    @include('layout.components.rekam')
@endsection

@section('navbar-active', '/'.Request::path())