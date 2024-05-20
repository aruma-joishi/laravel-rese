@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('main')

<p class="welcome">{{ Auth::user()->name }}でログイン中</p>

<form class="search-form" action="/search" method="get" id="search">
    @csrf
    <input class="search-form__item-input" type="text" name="keyword" value="{{request('keyword')}}">
    <button class="search-form__button-submit" type="submit">検索</button>
</form>

<select class="search-form__item-select" form="search" name="area">
    <option value="">All area</option>
    @foreach ($areas as $area)
    <option value="{{ $area->area }}" @if( request('area')==$area -> area ) selected @endif>{{ $area->area }}</option>
    @endforeach
</select>

<select class="search-form__item-select" form="search" name="genre">
    <option value="">All genre</option>
    @foreach ($genres as $genre)
    <option value="{{ $genre->genre }}" @if( request('genre')==$genre -> genre ) selected @endif>{{ $genre->genre }}</option>
    @endforeach
</select>

<div class="main">
    @foreach ($shops as $shop)
    <div class="card__item">
        <div class="card__img">
            <img src="{{$shop->image}}" alt="{{ $shop->image }}">
        </div>
        <div class="card__content">
            <h2 class="card__ttl">{{ $shop->name }}</h2>
            <div class="card__tag">
                <p>#{{ $shop->area }}</p>
                <p>#{{ $shop->genre }}</p>
            </div>
            <div class="card__footer">
                <a href="/detail/{{$shop->id}}">詳しく見る</a>
                @if($shop->favoriteCheck())

                <a href="/unfavorite/{{$shop->id}}">
                    <img src=/image/favorite.png alt="favorite">
                </a>
                @else
                <a href="/favorite/{{$shop->id}}">
                    <img src=/image/unfavorite.png alt="unfavorite">
                </a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection