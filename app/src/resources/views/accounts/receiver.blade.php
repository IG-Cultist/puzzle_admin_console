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
<h1>■メール受信者一覧</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>ユーザー名</th>
        <th>メール内容</th>
        <th>送信アイテム</th>
        <th>アイテム個数</th>
        <th>確認済み</th>
    </tr>
    </thead>
    @foreach($accounts as $account)
        <tr>
            <td>{{$account['id']}}</td>
            <td>{{$account['user_name']}}</td>
            <td>{{$account['mail_txt']}}</td>
            <td>{{$account['item_name']}}</td>
            <td>{{$account['item_sum']}}</td>
            <td>
                @if($account['isOpen'] === 0)
                    ☓
                @else
                    〇
                @endif
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
