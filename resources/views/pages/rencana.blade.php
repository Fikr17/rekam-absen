@extends('layout.app')
@section('title', 'Rencana')

@section('content')
    <h1 class="text-center">Rencana Absen</h1>
    
    <div class="table-responsive-md">
        <table class="table">
            <thead>
            <tr>
                <th scope="col" style="text-align: center">Email</th>
                <th scope="col" style="text-align: center">Tanggal</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($arr['rencana'] as $item)
                <tr>
                    <td class="text-center">{{$item->email}}</td>
                    <td class="text-center">{{$item->tanggal_absen}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection

@section('navbar-active', '/'.Request::path())