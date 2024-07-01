@extends('layouts.app')
@section('title','ユーザ一覧')
@section('user','active')
@section('body')
    {{$accounts->links('vendor.pagination.bootstrap-5')}}
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>レベル</th>
            <th>経験値</th>
            <th>ライフ</th>
        </tr>
        </thead>
        @foreach($accounts as $account)
            <tr>
                <td>{{$account['id']}}</td>
                <td>{{$account['name']}}</td>
                <td>{{$account['level']}}</td>
                <td>{{$account['exp']}}</td>
                <td>{{$account['life']}}</td>
            </tr>
        @endforeach
    </table>
    {{$accounts->links('vendor.pagination.bootstrap-5')}}
    <form method="get" action="{{route('accounts.home')}}">
        @csrf
        <input type="submit" value="戻る">
    </form>
@endsection
