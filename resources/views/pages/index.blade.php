@extends('layout.app')
@section('title', 'Home')

{{-- 
    - mulai/stop
    - mulai ulang scrap(bisa jadi delete all saja setiap hari)
    - pantau status bot 
    --}}
@section('content')
    <h2>Bot Absen</h2>

    <div class="container">
        @include('layout.components.reset')
        {{-- rekam absen --}}
        @include('layout.components.rekam')
        
        {{-- status aktivitas --}}
        <h3 class="text-center">Aktivitas</h3>
        @include('layout.components.status')
        @include('layout.components.os')
    </div>
@endsection

@section('navbar-active', Request::path())