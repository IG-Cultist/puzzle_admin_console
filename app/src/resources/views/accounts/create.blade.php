<html lang="ja" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/app.css">
</head>
<body>
<h1>アカウント新規登録</h1>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{route('accounts.docreate')}}">
                @csrf
                <label for="name">ユーザネーム:</label><input class="form-control" type="text" name="name"
                                                              id="name"><br>
                <label for="password">パスワード:</label><input class="form-control" type="password" name="password"
                                                                id="password"><br>
                <label for="repassword">パスワード再入力:</label><input class="form-control" type="password"
                                                                        name="repassword"
                                                                        id="repassword"><br>
                <label for="button"></label><input class="btn btn-info" type="submit" name="button" id="button"
                                                   value="登録">
                <ul>
                    @if(request()->get('error') === 'alreadyExists')
                        <li>すでに同じ名前が使われています</li>
                    @elseif(request()->get('error')  === 'noMatch')
                        <li>再入力したパスワードと一致しません</li>
                    @endif
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    @endif
                </ul>
            </form>
            <form method="get" action="{{route('accounts.home')}}">
                @csrf
                <label for="button">
                    <input class="btn btn-info" type="submit" name="button" id="button" value="戻る">
                </label>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
