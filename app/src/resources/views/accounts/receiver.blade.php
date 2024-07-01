@extends('layouts.app')
@section('title','受信者一覧')
@section('userRec','active')
@section('body')
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
@endsection
