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
        {{-- start rekam absen --}}
        @if (Session::get('log')==True || Cookie::get('log')==True)
            <h3 class="text-center">Rekam absen</h3>
            @include('layout.components.rekam')
        @endif
        
        {{-- Start status aktivitas --}}
        <h3 class="text-center">Aktivitas</h3>
        @include('layout.components.status')
        </div>
    </div>
@endsection

@section('navbar-active', Request::path())