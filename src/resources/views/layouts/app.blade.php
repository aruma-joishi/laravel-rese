<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Atte</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="container">
    <header class="header">
        <h1 class="header-ttl">Rese</h1>
        @if( Auth::check() )
        <nav class="header-nav">
            <ul class="header-nav-list">
                <li class="header-nav-item"><a href="/">ホーム</a></li>
                <li class="header-nav-item"><a href="/logout">ログアウト</a></li>
                <li class="header-nav-item"><a href="/mypage">マイページ</a></li>
            </ul>
        </nav>
        @else
        <nav class="header-nav">
            <ul class="header-nav-list">
                <li class="header-nav-item"><a href="/">ホーム</a></li>
                <li class="header-nav-item"><a href="/register">新規登録</a></li>
                <li class="header-nav-item"><a href="/login">ログイン</a></li>
            </ul>
        </nav>
        @endif
    </header>

    <main class="main">
        @yield('main')
    </main>
    <footer class="footer">
        <p class="footer-ttl">estra, inc.</p>
    </footer>
</body>

</html>