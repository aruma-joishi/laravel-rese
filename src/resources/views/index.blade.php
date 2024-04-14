@extends('layouts.app')

@section('main')

<p class="welcome">{{ Auth::user()->name }}さんお疲れ様です！</p>
<table>
    @foreach ($shops as $shop)
    <ul>
        <li>{{ $shop->image }}</li>
        <li>{{ $shop->name }}　ショップid{{$shop->id}}</li>
        <li>#{{ $shop->area }}</li>
        <li>#{{ $shop->genre }}</li>
        <a href="/detail/{{$shop->id}}">詳しく見る</a>
        <a href="/favorite/{{$shop->id}}">お気に入り</a>
        <a href="/unfavorite/{{$shop->id}}">お気に入り解除</a>

    </ul>
    @endforeach
</table>
@endsection