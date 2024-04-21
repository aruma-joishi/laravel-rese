@extends('layouts.app')

@section('main')
<p class="welcome">{{ Auth::user()->name }}でログイン中</p>
@foreach ($favorites as $favorite)
<ul>
  <li>{{ $shops['$favorite['shop_id']']->image }}</li>
  <li>{{ $shops->name }}</li>
  <li>#{{ $shops->area }}</li>
  <li>#{{ $shop->genre }}</li>
  <a href="/detail/{{$shop->id}}">{{$shop->id}}詳しく見る</a>

</ul>
@endforeach

@endsection