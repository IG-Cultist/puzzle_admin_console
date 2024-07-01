<html lang="ja" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ログイン</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/app.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{route('accounts.login')}}">
                @csrf
                <label for="name">ユーザネーム:</label><input class="form-control" type="text" name="name"
                                                              id="name"><br>
                <label for="password">パスワード:</label><input class="form-control" type="password" name="password"
                                                                id="password"><br>
                <label for="button"></label><input class="btn btn-info" type="submit" name="button" id="button">
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </div>
    </div>
</div>
<script src="/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
