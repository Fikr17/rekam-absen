@extends('layout.app')
@section('title', 'Login')

@section('content')
    <h2 class="text-center">Login</h2>

    <form action="/auth/login" method="post">
      @csrf
        <div class="mb-3">
          <label for="InputEmail" class="form-label">Email address</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="InputEmail" aria-describedby="emailHelp">
          @error('email')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="InputPassword" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="InputPassword">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" name="remember" id="remember">
          <label class="form-check-label" for="remember">Remember</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection

@section('navbar-active', '/'.Request::path())