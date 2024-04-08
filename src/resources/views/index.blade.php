@extends('layouts.app')

@section('main')

<table>
    @foreach ($shops as $shop)
    <ul>
        <li>{{ $shop->image }}</li>
        <li>{{ $shop->name }}</li>
        <li>#{{ $shop->area }}</li>
        <li>#{{ $shop->genre }}</li>
        <a href="/detail/{{$shop->id}}">{{$shop->id}}詳しく見る</a>
        <button>お気に入り</button>

    </ul>
    @endforeach
</table>
@endsection