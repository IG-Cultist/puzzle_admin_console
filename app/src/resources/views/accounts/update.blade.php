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
<h1>パスワードの変更</h1>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{route('accounts.edit',['id' =>$request])}}">
                @csrf
                <label for="password">
                    パスワード:
                    <input class="form-control" type="password" name="password" id="password">
                </label><br>
                <label for="password">
                    パスワード再入力:
                    <input class="form-control" type="password"
                           name="password_confirmation" id="password_confirmation">
                </label><br>
                <label for="button">
                    <input class="btn btn-info" type="submit" name="button" id="button">
                </label>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
