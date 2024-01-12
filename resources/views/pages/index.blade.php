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
        
        {{-- Start aktivitas --}}
        <h3 class="text-center">Aktivitas</h3>
        <div class="table-responsive-md w-auto">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">aktivitas</th>
                    <th scope="col">jam</th>
                    @if (Session::get('level')=='admin' || Cookie::get('level')=='admin')
                    <th scope="col">email</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                    @foreach ($arr['aktivitas'] as $item)
                    @if (Session::get('email')==$item->email || Session::get('level')=='admin' || Cookie::get('level')=='admin' || $item->email==null)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->jam}}</td>
                        @if (Session::get('level')=='admin' || Cookie::get('level')=='admin')
                        <td>{{$item->email}}</td>
                        @endif
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('navbar-active', Request::path())