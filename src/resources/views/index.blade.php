@extends('layouts.app')

@section('main')

<p class="welcome">{{ Auth::user()->name }}でログイン中</p>
<table>

    <form class="search-form" action="/search" method="get" id="search">
        @csrf
        <input class="search-form__item-input" type="text" name="keyword" value="{{request('keyword')}}">
        <button class="search-form__button-submit" type="submit">検索</button>
    </form>

    <!-- <select class="search-form__item-select" form="search" name="area">
        <option value="">All area</option>
        @foreach ($areas as $area)
        <option value="{{ $area->area }}">{{ $area->area }}</option>
        @endforeach
    </select> -->

    <select class="search-form__item-select" form="search" name="genre">
        <option value="">All genre</option>
        @foreach ($genres as $genre)
        <option value="{{ $genre->genre }}">{{ $genre->genre }}</option>
        @endforeach
    </select>


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