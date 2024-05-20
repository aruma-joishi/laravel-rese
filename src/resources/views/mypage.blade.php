@extends('layouts.app')

@section('main')
<p class="welcome">{{ Auth::user()->name }}でログイン中</p>

<h1>お気に入り</h1>
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
    </div>
  </div>
</div>
@endforeach


      <h1>予約情報</h1>

      @foreach ($reservations as $reservation)
      <h2>予約{{ $loop->index +1 }}</h2>
      <form class="delete-form" action="/delete" method="POST">
        @method('DELETE')
        @csrf
        <div class="delete-form__button">
          <input type="hidden" name="id" value="{{ $reservation['id'] }}">
          <button class="delete-form__button-submit" type="submit">削除</button>
        </div>
      </form>
      @foreach ($shops as $shop)
      @if($reservation['shop_id'] == $shop['id'])
      <li>{{$shop -> name}}</li>
      @endif

      @endforeach
      <li>{{$reservation -> date}}</li>
      <li>{{$reservation -> time}}</li>
      <li>{{$reservation -> number}}人</li>

      </ul>
      @endforeach

      @endsection