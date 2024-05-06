@extends('layouts.app')

@section('main')
<p class="welcome">{{ Auth::user()->name }}でログイン中</p>
@foreach ($adjustShops as $adjustShop)
<ul>
  <li>{{$adjustShop -> image}}</li>
  <li>{{$adjustShop -> name}}</li>
  <li>#{{$adjustShop -> area}}</li>
  <li>#{{$adjustShop -> genre}}</li>
  <a href="/detail/{{$adjustShop -> id}}">{{$adjustShop -> id}}詳しく見る</a>

</ul>
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
<li>{{$reservation -> number}}</li>

</ul>
@endforeach

@endsection