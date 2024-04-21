@extends('layouts.app')

@section('main')
<ul>
  <a href="/">戻る</a>
  <li>{{ $adjustShop->image }}</li>
  <li>{{ $adjustShop->name }}{{ $adjustShop->id }}</li>
  <li>#{{ $adjustShop->area }}</li>
  <li>#{{ $adjustShop->genre }}</li>
  <li>#{{ $adjustShop->content }}</li>
  <button>お気に入り</button>


  <form class="form" action="/reserve" method="post">
    @csrf
    <input class="search-form__item-select" type="hidden" name="date" value="$adjustShop->id">
    <input class="search-form__item-select" type="hidden" name="id" value="Auth::user()->id">
    <input class="search-form__item-select" type="date" name="date">
    <input class="search-form__item-select" type="time" name="time">
    <input class="search-form__item-select" type="number" name="number" min="1">
    <button type="submit" class="submit" name="action" value="submit">予約する</button>
</ul>
@endsection