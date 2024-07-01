@extends('layouts.app')
@section('title','所有アイテム一覧')
@section('userItem','active')
@section('body')
    <form method="post" action="{{route('accounts.showProp',['id' =>'search'])}}">
        @csrf
        <label for="search"><input class="form-control" type="search" name="search" id="search"
                                   placeholder="ユーザidを入力"></label>
        <input class="btn btn-info" type="submit" value="検索">
    </form>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>ユーザー名</th>
            <th>アイテム名</th>
            <th>所持個数</th>
        </tr>
        </thead>
        @foreach($accounts as $account)
            <tr>
                <td>{{$account['id']}}</td>
                <td>{{$account['user_name']}}</td>
                <td>{{$account['item_name']}}</td>
                <td>{{$account['item_num']}}</td>
            </tr>
        @endforeach
    </table>
@endsection
