@extends('layout.app')
@section('title', 'Setting')

@section('content')
    <h1>setting</h1>
    <div class="container">
        <div class="table-responsive w-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>kolom</th>
                        <th>value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arr['setting'][0] as $keys=>$item)
                    <tr>
                        <td>{{$keys}}</td>
                        <td>{{$item}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('navbar-active', '/'.Request::path())