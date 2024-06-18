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
<h1>■所有アイテム一覧</h1>
<form method="post" action="{{url('accounts/showPlayerItem')}}">
    @csrf
    <label for="search"><input class="form-control" type="search" name="search" id="search"
                               placeholder="idを入力"></label>
    <input class="btn btn-info" type="submit" value="検索">
</form>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>プレイヤー名</th>
        <th>アイテム名</th>
        <th>所持個数</th>
    </tr>
    </thead>
    @foreach($accounts as $account)
        <tr>
            <td>{{$account['id']}}</td>
            <td>{{$account['player_name']}}</td>
            <td>{{$account['item_name']}}</td>
            <td>{{$account['item_num']}}</td>
        </tr>
    @endforeach
</table>
<form method="get" action="{{url('accounts/home')}}">
    @csrf
    <input type="submit" value="戻る">
</form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</html>
