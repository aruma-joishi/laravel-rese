@extends('layouts.app')

@section('main')

<p class="welcome">{{ Auth::user()->name }}でログイン中</p>
<table>
    @foreach ($shops as $shop)
    <ul>
        <li>{{ $shop->image }}</li>
        <li>{{ $shop->name }}</li>
        <li>#{{ $shop->area }}</li>
        <li>#{{ $shop->genre }}</li>
        <a href="/detail/{{$shop->id}}">{{$shop->id}}詳しく見る</a>
        @if($shop->favoriteCheck())
        <a href="/unfavorite/{{$shop->id}}">お気に入り解除</a>
        @else
        <a href="/favorite/{{$shop->id}}">お気に入り</a>
        @endif

    </ul>
    @endforeach
</table>
@endsection