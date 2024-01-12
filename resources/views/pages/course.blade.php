@extends('layout.app')
@section('title', 'Daftar Kelas')

@section('content')
    <h1 class="text-center">Daftar Kelas</h1>
    <div class="table-responsive-md w-auto">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Password Absen</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($arr as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->nama}}</td>
                <td>{{$item->ada_pass}}</td>
                <td>{{$item->email}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
@endsection

@section('navbar-active', '/'.Request::path())