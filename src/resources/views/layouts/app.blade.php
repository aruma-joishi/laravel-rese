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
        <a href="#modal">
            <img src="/image/menu.png">
        </a>
        <h1 class="menu-open">Rese</h1>
        <div class="modal-wrapper" id="modal">
            <a href="#!" class="modal-overlay"></a>
            <div class="modal-window">
                <div class="modal-content">
                    @if( Auth::check() )
                    <h1 class="header-nav-item"><a href="/">Home</a></h1>
                    <h1 class="header-nav-item"><a href="/logout">Logout</a></h1>
                    <h1 class="header-nav-item"><a href="/mypage">Mypage</a></h1>
                    @else
                    <h1 class="header-nav-item"><a href="/">Home</a></h1>
                    <h1 class="header-nav-item"><a href="/register">Registration</a></h1>
                    <h1 class="header-nav-item"><a href="/login">Login</a></h1>
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