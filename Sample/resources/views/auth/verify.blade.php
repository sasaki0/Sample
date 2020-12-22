@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('本登録') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('メールが送信されました。') }}
                        </div>
                    @endif

                    {{ __('メールを送信しました。メールからメールアドレスの認証をお願いします。') }}
                    {{ __('メールが届いていない場合は') }}, <a href="{{ route('verification.resend') }}">{{ __('ここをクリックしてください') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
