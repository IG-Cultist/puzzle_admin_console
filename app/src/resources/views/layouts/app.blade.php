<html lang="ja" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/app.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-4">@yield('title')</span>
        </a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <form method="get" action="{{route('accounts.index')}}">
                    @csrf
                    <input class="nav-link @yield('index')" aria-current="page" type="submit" value="管理者">
                </form>
            </li>
            <li class="nav-item">
                <form method="get" action="{{route('accounts.user')}}">
                    @csrf
                    <input class="nav-link @yield('user')" aria-current="page" type="submit" value="ユーザー">
                </form>
            </li>
            <li class="nav-item">
                <form method="get" action="{{route('accounts.item')}}">
                    @csrf
                    <input class="nav-link @yield('item')" aria-current="page" type="submit" value="アイテム">
                </form>
            </li>
            <li class="nav-item">
                <form method="get" action="{{route('accounts.userItem')}}">
                    @csrf
                    <input class="nav-link @yield('userItem')" aria-current="page" type="submit" value="所持アイテム">
                </form>
            </li>
            <li class="nav-item">
                <form method="get" action="{{route('accounts.receiver')}}">
                    @csrf
                    <input class="nav-link @yield('userRec')" aria-current="page" type="submit" value="メール受信者">
                </form>
            </li>
            <li class="nav-item">
                <form method="get" action="{{route('accounts.send')}}">
                    @csrf
                    <input class="nav-link @yield('send')" aria-current="page" type="submit" value="メール送信">
                </form>
            </li>
            <li class="nav-item">
                <form method="get" action="{{route('accounts.create')}}">
                    @csrf
                    <input class="nav-link @yield('create')" aria-current="page" type="submit" value="新規登録">
                </form>
            </li>
            <li class="nav-item">
                <form method="post" action="{{route('accounts.logout')}}">
                    @csrf
                    <input class="nav-link" aria-current="page" type="submit" value="ログアウト">
                </form>
            </li>
        </ul>
    </header>
</div>
@yield('body')
<script src="/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
