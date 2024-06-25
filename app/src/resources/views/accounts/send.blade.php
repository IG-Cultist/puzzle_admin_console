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
<h1>メール送信</h1>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <ul>
                @if(!empty(request()->get('send')))
                    <li>送信完了</li>
                @endif
            </ul>
            <form method="post" action="{{route('accounts.sendMail')}}">
                @csrf
                <label for="name">ユーザID</label><input class="form-control" type="text" name="user_id"
                                                         id="user_id" placeholder="送信先ユーザID"><br>
                <label for="mail_id">メールID</label><input class="form-control" type="text" name="mail_id"
                                                            id="mail_id" placeholder="送信するメールID"><br>
                <label for="button">
                    <input class="btn btn-info" type="submit" name="button" id="button" value="送信">
                </label>
            </form>
            <form method="get" action="{{route('accounts.item')}}">
                @csrf
                <input class="btn btn-info" type="submit" name="button" id="button" value="アイテム一覧へ">
            </form>

            <form method="get" action="{{route('accounts.receiver')}}">
                @csrf
                <input class="btn btn-info" type="submit" name="button" id="button" value="受信者一覧へ">
            </form>

            <form method="get" action="{{route('accounts.home')}}">
                @csrf
                <input class="btn btn-info" type="submit" name="button" id="button" value="戻る">
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
