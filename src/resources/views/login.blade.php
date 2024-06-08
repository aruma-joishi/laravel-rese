@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('main')

<div class="login">
  <h2 class="main-ttl">Login</h2>
  <div class="login__content">
    <form action="/login" method="post">
      @csrf
      <div class="login__email">
        <div class="email__img">
          <img src=/image/email.png alt="email">
        </div>
        <input class="input" type="email" placeholder="Email" name="email" value="{{ old('email') }}">
      </div>
      <div class="login__password">
        <div class="password__img">
          <img src=/image/password.png alt="password">
        </div>
        <input class="input" type="password" placeholder="Password" name="password">
      </div>
      <div class="error">
        @error('email')
        <p>{{ $message }}</p>
        @enderror
        @error('password')
        <p>{{ $message }}</p>
        @enderror
      </div>
      <div class="btn-container">
        @if (session('result'))
        <div class="flash_message">
          {{ session('result') }}
        </div>
        @endif
        <input type="submit" value="ログイン">
      </div>

    </form>
  </div>
</div>

@endsection