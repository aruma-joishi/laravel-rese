@extends('layouts.app')

@section('main')

<div class="login">
  <h2 class="main-ttl">Login</h2>

  <div class="login__content">
    <form action="/login" method="post">
      @csrf
      <div class="login-email">
        <img src=/image/email.png alt="email">
        <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
        @error('email')
        <p>{{ $message }}</p>
        @enderror
      </div>

      <div class="login__password">
        <img src=/image/password.png alt="password">
        <input type="password" placeholder="Password" name="password">
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