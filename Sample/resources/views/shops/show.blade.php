@extends('layouts.app')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>詳細画面</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
    crossorigin="anonymous">
  @section('content')

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">詳細</div>
                <div class="card-body">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"><h5>{{ __('店名') }}</h5></label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->name }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="genre" class="col-md-4 col-form-label text-md-right"><h5>{{ __('ジャンル') }}</h5></label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->genre->genre }}
                    　　</div>
                  　</div>

                    <div class="form-group row">
                        <label for="access" class="col-md-4 col-form-label text-md-right"><h5>{{ __('アクセス') }}</h5></label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->access }}
                    　　</div>
                  　</div>

                  <div class="form-group row">
                        <label for="prefecture" class="col-md-4 col-form-label text-md-right"><h5>{{ __('住所') }}</h5></label>
                        <div class="col-md-6 ">
                            
                    　　</div>
                        <label for="prefecture" class="col-md-4 col-form-label text-md-right">{{ __('県') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->address->prefecture }}
                    　　</div>
                    　　<label for="city" class="col-md-4 col-form-label text-md-right">{{ __('市') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->address->city }}
                    　　</div>
                        <label for="address_num" class="col-md-4 col-form-label text-md-right">{{ __('番地') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->address->address_num }}
                    　　</div>
                        <label for="build_name" class="col-md-4 col-form-label text-md-right">{{ __('建物名') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->address->build_name }}
                    　　</div>
                   </div>

                   
                   <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key=AIzaSyB7ktdfK_XxXZMVBTQzF8x72jmf73wR3Ys&amp;q={{ $shop->access }}'
                            width='100%'
                            height='320'
                            frameborder='0'>
                    </iframe>
                    
                    
                    
                   <div class="form-group row">
                   
                        <label for="business_time" class="col-md-4 col-form-label text-md-right"><h5>{{ __('営業時間') }}</h5></label>
                        <div class="col-md-6 ">
                    </div>
                
                        <label for="start" class="col-md-4 col-form-label text-md-right">{{ __('開店時間') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->hour->start }}
                    　　</div>
                        <label for="start" class="col-md-4 col-form-label text-md-right">{{ __('閉店時間') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->hour->end }}
                    　　</div>
                    　　<label for="city" class="col-md-4 col-form-label text-md-right">{{ __('定休日') }}</label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->hour->holiday }}
                    　　</div>
                   </div>

                   <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"><h5>{{ __('PR文') }}</h5></label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->pr_text }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"><h5>{{ __('クーポン') }}</h5></label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->coupon_info }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"><h5>{{ __('電話番号') }}</h5></label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->tel }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"><h5>{{ __('Email') }}</h5></label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->email }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"><h5>{{ __('URL') }}</h5></label>
                        <div class="col-md-6 input-group-text">
                            {{ $shop->site_url }}
                        </div>
                    </div>
                    <div id="player"></div>
                    

                    <div class="form-group row">
                        <label for="business_time" class="col-md-4 col-form-label text-md-right"><a href="/"><h3>{{ __('ホームに戻る') }}</h3></a></label>
                        @auth
                        @if($shop->user_id === $login_id)
                        <label for="business_time" class="col-md-4 col-form-label"><a href="/shops/{{$shop->id}}/edit"><h3>{{ __('編集する') }}</h3></a></label>

                        <form action="/shops/{{$shop->id}}" method="post">
                            @csrf
                            <div class="form-group row" class="text-right">
                            
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" class="form-control" name="" value="削除する">
                            
                        </div>
                        </form>
                        @endif
                        @endauth
                        

                            
                    　　</div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
<a href="/">ホームに戻る</a>








<!-- <h3>店名：{{$shop->name}}</h3>
<h3>ジャンル：{{$shop->genre->genre}}</h3>
<h3>アクセス：{{$shop->access}}</h3>
<h3>住所</h3>
<h3>県：{{$shop->address->prefecture}} 市：{{$shop->address->city}} 
番地：{{$shop->address->address_num}}　建物名：{{$shop->address->build_name}}</h3>
<h3>営業時間</h3>
<h3>開店時間：{{$shop->hour->start}}　閉店時間：{{$shop->hour->end}}　定休日：{{$shop->hour->holiday}}</h3>
<h3>PR文：{{$shop->pr_text}}</h3>
<h3>クーポン：{{$shop->coupon_info}}</h3>
<h3>電話番号：{{$shop->tel}}</h3>
<h3>Email：{{$shop->email}}</h3>
<h3>URL：{{$shop->site_url}}</h3> -->





  @endsection
  <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '360',
          width: '640',
          videoId: 'M7lc1UVf-VE',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 1000000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>
  </body>
