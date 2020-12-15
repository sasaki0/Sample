@extends('layouts.app')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>お店一覧</title>
@section('content')
<body>

<h2>検索結果</h2>
<p>検索キーワード 店名：{{$name}} エリア：{{$access}} ジャンル：{{$genre}}</p>

@isset($data)
<div class="table-resopnsive">
<table class="table table-striped">
    <thead>
        <tr>
            <th>{{__('店名')}}</th>
            <th>{{__('ジャンル')}}</th>
            <th>{{__('エリア')}}</th>
            <th>{{__('PR文')}}</th>
        </tr>
    </thead>
<tbody>
@foreach($data as $item)
        <tr>
            <td><a href={{route('shops.show',['id'=>$item->id])}}>
            {{$item->name}}
            </a>
            </td>
            <td>{{$item->genre}}</td>
            <td>{{$item->access}}</td>
            <td>{{$item->pr_text}}</td>
            <!-- <td><a href={{route('shops.edit',['id'=>$item->id])}}>更新</a></td> -->
        </tr>
    @endforeach
</tbody>
</table>
                        
<!-- <table>
    <tr><th>店名</th><th>ジャンル</th><th>エリア</th><th>PR文</th></tr>
    @foreach($data as $item)
        <tr>
            <td><a href={{route('shops.show',['id'=>$item->id])}}>
            {{$item->name}}
            </a>
            </td>
            <td>{{$item->genre}}</td>
            <td>{{$item->access}}</td>
            <td>{{$item->pr_text}}</td>
            <td><a href={{route('shops.edit',['id'=>$item->id])}}>更新</a></td>
        </tr>
    @endforeach

</table> -->
@endisset
@endsection

