@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('main')
<h1>{{ Auth::user()->name }}さん</h1>
<div class="mypage">
  <div class="reserve">
    <h1>予約情報</h1>
    <div class="reserve__content">
      @foreach ($reservations as $reservation)
        <div class="reserve__header">
          <h2>予約{{ $loop->index +1 }}</h2>
          <button class="delete-form__button-submit" type="submit">✕</button>
        </div>
        <form class="delete-form" action="/delete" method="POST">
          @method('DELETE')
          @csrf
          <input type="hidden" name="id" value="{{ $reservation['id'] }}">
        </form>
        <table>
          <tr>
            <th>Shop</th>
            <th>Date</th>
            <th>Time</th>
            <th>Number</th>
          </tr>
          <tr>
            @foreach ($shops as $shop)
            @if($reservation['shop_id'] == $shop['id'])
            <td>{{$shop -> name}}</td>
            @endif
            @endforeach
            <td>{{$reservation -> date}}</td>
            <td>{{$reservation -> time}}</td>
            <td>{{$reservation -> number}}人</td>
          </tr>
        </table>
        @endforeach
      </div>
    </div>
    <div class="favorite">
      <h1>お気に入り</h1>
      <div class="favorite__content">
        @foreach ($adjustShops as $adjustShop)
        <div class="card__item">
          <div class="card__img">
            <img src="{{$adjustShop -> image}}" alt="{{$adjustShop -> image}}">
          </div>
          <div class="card__content">
            <h2>{{$adjustShop -> name}}</h2>
            <div class="card__tag">
              <p>#{{$adjustShop -> area}}</p>
              <p>#{{$adjustShop -> genre}}</p>
            </div>
            <div class="card__footer">
              <a href="/detail/{{$adjustShop -> id}}">詳しく見る</a>
              @if($shop->favoriteCheck())
              <a class="favorite-icon" href="/unfavorite/{{$shop->id}}">
                <img src=/image/favorite.png alt="favorite">
              </a>
              @else
              <a class="favorite-icon" href="/favorite/{{$shop->id}}">
                <img src=/image/unfavorite.png alt="unfavorite">
              </a>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  @endsection