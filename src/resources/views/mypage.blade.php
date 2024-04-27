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

@foreach ($reservations as $reservation)
<ul>
  <li>{{$adjustShop['$reservation -> shop_id']['name']}}</li>
  <li>{{$reservation -> date}}</li>
  <li>{{$reservation -> time}}</li>
  <li>{{$reservation -> number}}</li>

</ul>
@endforeach

@endsection