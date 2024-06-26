@extends('layouts.app')
@section('title','メール一覧')
@section('userRec','active')
@section('body')
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>メール内容</th>
            <th>送信アイテムID</th>
            <th>アイテム個数</th>
        </tr>
        </thead>
        @foreach($mails as $item)
            <tr>
                <td>{{$item['id']}}</td>
                <td>{{$item['text']}}</td>
                <td>{{$item['item_id']}}</td>
                <td>{{$item['item_sum']}}</td>
            </tr>
        @endforeach
    </table>
@endsection
