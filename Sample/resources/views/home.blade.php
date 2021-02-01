@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ログイン出来ました!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/shops/create">新規作成画面へ</a><br><br>
                    <a href="/">検索画面へ</a>
                    

                    
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
