@extends('layouts.notapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('確認用メールアドレスをご確認ください！') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('ユーザ確認用メールがあなたのE-メールアドレスに送信しました。') }}
                            </div>
                        @endif
                        <p>
                            {{ __('確認用メールをご確認ください。') }}
                        </p>
                        <p>
                            {{ __('もし、メールが届いていない場合は、') }} <a
                                    href="{{ route('verification.resend') }}">{{ __('こちら') }}</a>{{ __('をクリック') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
