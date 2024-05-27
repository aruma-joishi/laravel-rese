@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('main')

<div class="thanks__content">
  <h2>ご予約ありがとうございます</h2>
  <a href="#" onclick="history.back()" return false;>戻る</button>
</div>

@endsection`