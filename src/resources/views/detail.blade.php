@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('main')
<div class="detail__content">
  <div class="shop">
    <div class="shop__header">
      <button class="back-button" type="button" onClick="history.back()"><</button>
      <h2>{{ $adjustShop->name }}</h2>
    </div>
    <div class="shop__cotent">
      <div class="card__img">
        <img src="{{ $adjustShop->image }}" alt="{{ $adjustShop->image }}">
      </div>
      <div class="shop__tag">
        <p>#{{ $adjustShop->area }}</p>
        <p>#{{ $adjustShop->genre }}</p>
      </div>
      <p>{{ $adjustShop->content }}</p>
    </div>
  </div>
  <div class="reserve">
    <h2>予約</h2>
    <form class="form" action="/reserve" method="post" id="search">
      @csrf
      <input class="search-form__item-select" type="hidden" name="shop_id" value="{{$adjustShop->id}}">
      <input class="search-form__item-select" type="hidden" name="user_id" value="{{Auth::user()->id}}">
      <input class="search-form__item-select" type="date" name="date" value="{{ old('date') }}">
      <input class="search-form__item-select" type="time" name="time" value="{{ old('time') }}">
      <input class="search-form__item-select" type="number" name="number" min="1" value="{{ old('number') }}">
    </form>
    <table>
      <tr>
        <th>Shop</th>
        <th>Date</th>
        <th>Time</th>
        <th>Number</th>
      </tr>
      <tr>
        <td>{{ $adjustShop->name }}</td>
        <td>2024/05/29</td>
        <td>17:57</td>
        <td>2人</td>
      </tr>
    </table>
    <div class="error">
      @error('date')
      <p>{{ $message }}</p>
      @enderror
      @error('time')
      <p>{{ $message }}</p>
      @enderror
      @error('number')
      <p>{{ $message }}</p>
      @enderror
    </div>
    <button type="submit" class="submit" name="action" value="submit" form="search">予約する</button>
  </div>
</div>
@endsection