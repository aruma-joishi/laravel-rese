@extends('layouts.app')

@section('main')
<ul>
  <button type="button" onClick="history.back()">戻る</button>
  <li>{{ $adjustShop->image }}</li>
  <li>{{ $adjustShop->name }}{{ $adjustShop->id }}</li>
  <li>#{{ $adjustShop->area }}</li>
  <li>#{{ $adjustShop->genre }}</li>
  <li>#{{ $adjustShop->content }}</li>
  @if($adjustShop->favoriteCheck())
  <a href="/unfavorite/{{$adjustShop->id}}">お気に入り解除</a>
  @else
  <a href="/favorite/{{$adjustShop->id}}">お気に入り</a>
  @endif


  <form class="form" action="/reserve" method="post">
    @csrf
    <input class="search-form__item-select" type="hidden" name="shop_id" value="{{$adjustShop->id}}">
    <input class="search-form__item-select" type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <input class="search-form__item-select" type="date" name="date">
    @error('date')
    {{ $message }}
    @enderror
    <input class="search-form__item-select" type="time" name="time">
    @error('time')
    {{ $message }}
    @enderror
    <input class="search-form__item-select" type="number" name="number" min="1">
    @error('number')
    {{ $message }}
    @enderror
    <button type="submit" class="submit" name="action" value="submit">予約する</button>
</ul>
@endsection