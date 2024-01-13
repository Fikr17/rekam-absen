@extends('layout.app')
@section('title', 'Daftar Kelas')

@section('content')
    <h1 class="text-center">Daftar Kelas</h1>
    @include('layout.components.course')
@endsection

@section('navbar-active', '/'.Request::path())