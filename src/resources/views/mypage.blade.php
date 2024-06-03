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
      <div class="reserve__item">
        <div class="reserve__header">
          <div class="reserve__title">
          <div class="reserve__header__time">
            <img src=/image/time.png alt="time">
          </div>
          <h2>予約{{ $loop->index +1 }}</h2>
          </div>
          <div class="reserve__button">
            <form class="update-form" action="/update" method="post" id="update{{ $loop->index +1 }}">
              @method('PATCH')
              @csrf
              <input type="hidden" name="id" value="{{ $reservation -> id }}">
              <input type="hidden" name="shop_id" value="{{ $reservation['shop_id']}}">
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <button class="update-form__button-submit" type="submit">更新</button>
            </form>

            <form class="delete-form" action="/delete" method="post">
              @method('DELETE')
              @csrf
              <input type="hidden" name="id" value="{{ $reservation['id'] }}">
              <button class="delete-form__button-submit" type="submit">✕</button>
            </form>
          </div>
        </div>
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
            <td>
              <input form="update{{ $loop->index +1 }}" type="date" name="date" value="{{$reservation -> date}}">
            </td>
            <td>
              <input form="update{{ $loop->index +1 }}" type="time" name="time" value="{{$reservation -> time}}">
            </td>
            <td>
              <input form="update{{ $loop->index +1 }}" type="number" name="number" value="{{$reservation -> number}}">人
            </td>
          </tr>
        </table>
      </div>
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
            <a class="card__footer__detail" href="/detail/{{$adjustShop -> id}}">詳しく見る</a>
            <a class="favorite-icon" href="/unfavorite/{{$adjustShop->id}}">
              <img src=/image/favorite.png alt="favorite">
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection