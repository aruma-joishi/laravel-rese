<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>

<body class="container">
    <header class="header">
        <div class="header__content">
            <a class="menu-image" href="#modal">
                <img src="/image/menu.png">
            </a>
            <h1 class="menu-text">Rese</h1>
        </div>
        <div class="modal-wrapper" id="modal">
            <a href="#!" class="modal-overlay"></a>
            <div class="modal-window">
                <div class="modal-content">
                    @if( Auth::check() )
                    <a class="modal__text"href="/">Home</a>
                    <a class="modal__text"href="/logout">Logout</a>
                    <a class="modal__text"href="/mypage">Mypage</a>
                    @else
                    <a class="modal__text"href="/">Home</a>
                    <a class="modal__text"href="/register">Registration</a>
                    <a class="modal__text"href="/login">Login</a>
                    @endif
                </div>
                <a href="#!" class="modal-close">×</a>
            </div>
        </div>



    </header>

    <main class="main">
        @yield('main')
    </main>
</body>

</html>