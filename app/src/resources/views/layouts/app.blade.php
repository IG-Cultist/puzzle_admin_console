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
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">@yield('title')</span>
    </a>
</header>
<main class="d-flex flex-nowrap">
    <div class="flex-shrink-0 p-3" style="width: 280px;">

        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                    MasterData
                </button>
                <div class="collapse show" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <form method="get" action="{{route('accounts.index')}}">
                                @csrf
                                <input class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                       type="submit" value="管理者">
                            </form>
                        </li>
                        <li>
                            <form method="get" action="{{route('accounts.item')}}">
                                @csrf
                                <input class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                       type="submit" value="アイテム">
                            </form>
                        </li>
                        <li>
                            <form method="get" action="{{route('accounts.send')}}">
                                @csrf
                                <input class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                       type="submit" value="メール送信">
                            </form>
                        </li>
                        <li>
                            <form method="get" action="{{route('accounts.mailList')}}">
                                @csrf
                                <input class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                       type="submit" value="メールテンプレート">
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    UserData
                </button>
                <div class="collapse" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <form method="get" action="{{route('accounts.user')}}">
                                @csrf
                                <input class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                       type="submit" value="ユーザー">
                            </form>
                        </li>
                        <li>
                            <form method="get" action="{{route('accounts.userItem')}}">
                                @csrf
                                <input class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                       type="submit" value="所持アイテム">
                            </form>
                        </li>
                        <li>
                            <form method="get" action="{{route('accounts.receiver')}}">
                                @csrf
                                <input class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                       type="submit" value="メール受信者">
                            </form>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    Account
                </button>
                <div class="collapse" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <form method="get" action="{{route('accounts.create')}}">
                                @csrf
                                <input class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                       type="submit" value="Create Account">
                            </form>
                        </li>
                        <li>
                            <form method="post" action="{{route('accounts.logout')}}">
                                @csrf
                                <input class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                       type="submit" value="Sign out">
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="b-example-divider b-example-vr"></div>
    @yield('body')</main>
<script src="/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
