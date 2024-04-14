@extends('layouts.app')

@section('main')
<ul>
  <a href="/">戻る</a>
  <li>{{ $adjustShop->image }}</li>
  <li>{{ $adjustShop->name }}</li>
  <li>#{{ $adjustShop->area }}</li>
  <li>#{{ $adjustShop->genre }}</li>
  <li>#{{ $adjustShop->content }}</li>
  <button>お気に入り</button>
</ul>
@endsection`