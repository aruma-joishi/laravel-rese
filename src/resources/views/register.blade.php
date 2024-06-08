@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('main')

<div class="register">
  <h2 class="main-ttl">Register</h2>
  <div class="register__content">
    <form action="/register" method="post">
      @csrf
      <div class="register__name">
        <div class="name__img">
          <img src=/image/user.png alt="user">
        </div>
        <input class="input" type="text" placeholder="Username" name="name" value="{{ old('name') }}">
      </div>
      <div class="register__email">
        <div class="email__img">
          <img src=/image/email.png alt="email">
        </div>
        <input class="input" type="email" placeholder="Email" name="email" value="{{ old('email') }}">
      </div>
      <div class="register__password">
        <div class="password__img">
          <img src=/image/password.png alt="password">
        </div>
        <input class="input" type="password" placeholder="Password" name="password">
      </div>
      <div class="error">
        @error('name')
        <p>{{ $message }}</p>
        @enderror
        @error('email')
        <p>{{ $message }}</p>
        @enderror
        @error('password')
        <p>{{ $message }}</p>
        @enderror
      </div>
      <div class="input-container">
        <div class="btn-container">
          @if (session('result'))
          <div class="flash_message">
            {{ session('result') }}
          </div>
          @endif
          <input type="submit" value="登録">
        </div>
    </form>
  </div>
</div>
@endsection