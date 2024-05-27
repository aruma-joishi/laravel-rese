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
      <div class="register__content">

        <div class="register__content">
          <input type="text" placeholder="名前" name="name" value="{{ old('name') }}">
          @error('name')
          <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="input-container">
          <input type="email" placeholder="メールアドレス" name="email" value="{{ old('email') }}">
          @error('email')
          <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="input-container">
          <input type="password" placeholder="パスワード" name="password">
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