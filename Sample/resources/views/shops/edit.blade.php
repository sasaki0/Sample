@extends('layouts.app')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>更新画面</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
    crossorigin="anonymous">

    <style>
   
    </style>
  </head>
  @section('content')
<body>



@csrf
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{$shop->name}}を編集する</div>
                <div class="card-body">
                <form action="/shops/{{ $shop->id }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                  @csrf
                  <div class="alert alert-danger" role="alert">
                    ※画像ファイルを再度選択してください！！
                　</div>
                  <input type="file" name="image" accept="image/png, image/jpeg" >
                  <img src="../../uploads/{{ $shop->image }}" width="320px" height="200px">
                  

                    <div class="form-group row">
                    <label for="business_time" class="col-md-4 col-form-label text-md-right">{{ __('店名') }}</label>
                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $shop->name }}"　placeholder="店名を入れる">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="business_time" class="col-md-4 col-form-label text-md-right">{{ __('営業時間') }}</label>
                            <div class="col-md-6">
                                
                            </div>
                            <label for="start" class="col-md-4 col-form-label text-md-right">{{ __('開店時間') }}</label>
                            <div class="col-md-6">
                            <input id="start" type="text" class="form-control" name="start" value="{{ $shop->hour->start }}"　placeholder="開店時間を入れる">                        
                            </div>
                            <label for="end" class="col-md-4 col-form-label text-md-right">{{ __('閉店時間') }}</label>
                            <div class="col-md-6">
                            <input id="end" type="text" class="form-control" name="end" value="{{ $shop->hour->end }}"　placeholder="閉店時間を入れる">                        
                            </div>
                            <label for="holiday" class="col-md-4 col-form-label text-md-right">{{ __('定休日') }}</label>
                            <div class="col-md-6">
                                <input id="holiday" type="text" class="form-control" name="holiday" value="{{ $shop->hour->holiday }}"　placeholder="定休日を入れる">
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('住所') }}</label>
                            <div class="col-md-6">
                                
                            </div>
                            <label for="p_code" class="col-md-4 col-form-label text-md-right">{{ __('郵便番号') }}</label>
                            <div class="col-md-6">
                            <input id="p_code" type="text" class="form-control" name="p_code" value="{{ $shop->address->p_code }}"　placeholder="番地を入れる">                          </div>
                            <label for="prefecture" class="col-md-4 col-form-label text-md-right">{{ __('県') }}</label>
                            <div class="col-md-6">
                            <input id="prefecture" type="text" class="form-control" name="prefecture" value="{{ $shop->address->prefecture }}"　placeholder="番地を入れる">                          </div>
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('市') }}</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ $shop->address->city }}"　placeholder="市を入れる">
                            </div>
                            <label for="address_num" class="col-md-4 col-form-label text-md-right">{{ __('番地') }}</label>
                            <div class="col-md-6">
                                <input id="address_num" type="text" class="form-control" name="address_num" value="{{ $shop->address->address_num }}"　placeholder="番地を入れる">
                            </div>
                            <label for="build_name" class="col-md-4 col-form-label text-md-right">{{ __('建物名') }}</label>
                            <div class="col-md-6">
                                <input id="build_name" type="text" class="form-control" name="build_name" value="{{ $shop->address->build_name }}"　placeholder="建物名を入れる">
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="access" class="col-md-4 col-form-label text-md-right">{{ __('アクセス') }}</label>
                            <div class="col-md-6">
                            <input id="access" type="text" class="form-control" name="access" value="{{ $shop->access }}"　placeholder="所在地を入れる">                          </div>
                    </div>

                    <div class="form-group row">
                            <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('ジャンル') }}</label>
                            <div class="col-md-6">
                                <select name="genre" >
        　                          <option value="{{$shop->genre->genre_id}}">{{$shop->genre->genre}}</option>
                                    <option value="0">指定なし</option>
        　                          <option value="1">飲食</option>
        　                          <option value="2">ファッション</option>
        　                          <option value="3">家具</option>
                                </select>
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="pr_text" class="col-md-4 col-form-label text-md-right">{{ __('PR文') }}</label>
                            <div class="col-md-6">
                                <input id="pr_text" type="text" class="form-control" name="pr_text" value="{{ $shop->pr_text }}"　placeholder="PR文を入れる">
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="coupon_info" class="col-md-4 col-form-label text-md-right">{{ __('クーポン情報') }}</label>
                            <div class="col-md-6">
                                <input id="coupon_info" type="text" class="form-control" name="coupon_info" value="{{ $shop->coupon_info }}"　placeholder="クーポン情報を入れる">
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('電話番号') }}</label>
                            <div class="col-md-6">
                                <input id="tel" type="tel" class="form-control" name="tel" value="{{ $shop->tel }}"　placeholder="電話番号を入れる">
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $shop->email }}"　placeholder="Emailを入れる">
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="site_url" class="col-md-4 col-form-label text-md-right">{{ __('URL') }}</label>
                            <div class="col-md-6">
                                <input id="site_url" type="url" class="form-control" name="site_url" value="{{ $shop->site_url }}"　placeholder="URLを入れる">
                            </div>
                    </div>

                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name='action' value='add'>
                                    {{ __('送信') }}
                                </button>
                                
                            　　<div class="text-right"><a href="/">ホームに戻る</a></div>
                       　　　</div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  </body>
  @endsection