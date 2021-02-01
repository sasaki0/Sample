<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>サイトの名前</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
                font-size: 130%;
            }

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }


            .m-b-md {
                margin-bottom: 30px;
            }

            .eria{
                float: left;
            }

            .genle{
                float: left;
            }

            .search{
                float: left;
            }

            .submit1{
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">ホーム</a>
                    @else
                    　　
                        <a href="{{ route('login') }}">ログイン</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}">登録</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="top-left">
            <h3>
            @php
                echo('今日の日付：'.date('Y/m/d'));
            @endphp
            </h3>
            </div>
           
            <div class="content">
                <div class="title m-b-md">
                    サイトの名前(予定)
                </div>
    
            <form method ="GET" action="/shoplist">
            <div class=search>
            店名<input type="text" name="name" placeholder="店名を入れる">

            エリア<input type="text" name="access" placeholder="駅や地名を入れる">

            ジャンル
                        <select name="genre">
                            <option value="0">指定なし</option>
                            <option value="1">飲食</option>
                            <option value="2">ファッション</option>
                            <option value="3">家具</option>
                        </select>
            </div>

            <div class=submit1>
                <input type="submit" value="検索">
            </div>

            </form>


            
                

        </div>
    </body>
</html>
