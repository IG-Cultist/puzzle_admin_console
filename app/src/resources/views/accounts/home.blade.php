<html lang="ja" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
<h1>Welcome ;v)</h1>
<form method="get" action="{{route('accounts.index')}}">
    @csrf
    <input class="btn btn-info" type="submit" value="管理者一覧">
</form>
<form method="get" action="{{route('accounts.user')}}">
    @csrf
    <input class="btn btn-info" type="submit" value="ユーザ一覧">
</form>
<form method="get" action="{{route('accounts.item')}}">
    @csrf
    <input class="btn btn-info" type="submit" value="アイテム一覧">
</form>
<form method="get" action="{{route('accounts.userItem')}}">
    @csrf
    <input class="btn btn-info" type="submit" value="所持アイテム一覧">
</form>
<form method="get" action="{{route('accounts.receiver')}}">
    @csrf
    <input class="btn btn-info" type="submit" value="メール受信者一覧">
</form>
<form method="get" action="{{route('accounts.send')}}">
    @csrf
    <input class="btn btn-info" type="submit" value="メール送信">
</form>
<form method="get" action="{{route('accounts.create')}}">
    @csrf
    <input class="btn btn-info" type="submit" value="アカウント新規登録">
</form>
<form method="post" action="{{route('accounts.logout')}}">
    @csrf
    <input class="btn btn-info" type="submit" value="ログアウト">
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
