@extends('layout.app')
@section('title', 'Status')

@section('content')
    <h2 class="text-center">status</h2>
    <div class="container">
        <div class="table-responsive-md w-auto">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">aktivitas</th>
                    <th scope="col">jam</th>
                    @if (Session::get('log')==True || Cookie::get('log')==True)
                    <th scope="col">email</th>   
                    @endif
                </tr>
                </thead>
                <tbody>
                    @foreach ($os as $item)
                    @if (Session::get('email')==$item->email || Session::get('level')=='admin' || Cookie::get('level')=='admin' || $item->email==null)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->jam}}</td>
                        @if (Session::get('log')==True || Cookie::get('log')==True)
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

@section('navbar-active', '/'.Request::path())