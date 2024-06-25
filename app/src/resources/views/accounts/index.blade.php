<html lang="ja" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/app.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>■アカウント一覧</h1>
<form method="post" action="{{url('accounts/show')}}">
    @csrf
    <label for="search"><input class="form-control" type="search" name="search" id="search"
                               placeholder="名前を入力"></label>
    <input class="btn btn-info" type="submit" value="検索">
</form>
<ul>
    @if(!empty(request()->get('deleted')))
        <li>{{request()->get('deleted')}}の削除に成功</li>
    @elseif(!empty(request()->get('updated')))
        <li>{{request()->get('updated')}}のパスワードを更新</li>
    @endif
</ul>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>名前</th>
        <th>パスワードハッシュ</th>
        <th>編集</th>
        <th></th>
    </tr>
    </thead>
    @foreach($accounts as $account)
        <tr>
            <td>{{$account['id']}}</td>
            <td>{{$account['name']}}</td>
            <td>{{$account['password']}}</td>
            <td>
                <form method="get" action="{{route('accounts.update',['id' =>$account['id']])}}">
                    @csrf
                    <input class="btn btn-info" type="submit" value="変更">
                </form>
            </td>
            <td>
                <form method="post" action="{{route('accounts.destroy',['id' =>$account['id']])}}">
                    @csrf
                    <input class="btn btn-info" type="submit" value="削除">
                </form>
            </td>
        </tr>
    @endforeach
</table>

<form method="get" action="{{route('accounts.home')}}">
    @csrf
    <input type="submit" value="戻る">
</form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</html>
