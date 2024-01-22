@extends('layout.app')
@section('title', 'Rencana')

@section('content')
    <h1 class="text-center">Rencana Absen</h1>
    
    <div class="table-responsive-md">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" style="text-align: center">ID Kelas</th>
                <th scope="col" style="text-align: center">Kelas</th>
                <th scope="col" style="text-align: center">Email</th>
                <th scope="col" style="text-align: center">Tanggal</th>
                <th scope="col" style="text-align: center">Jam</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($arr['rencana'] as $item)
                <tr>
                    <td>{{$item->id_link_absen}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->email}}</td>
                    <td class="text-center">{{$item->tanggal_absen}}</td>
                    <td class="text-center">{{$item->jam_absen}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection

@section('navbar-active', '/'.Request::path())