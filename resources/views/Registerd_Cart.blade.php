@if(Auth::user()->rank == 1)
    @extends('layouts.adminapp')
@else
    @extends('layouts.notapp')
@endif

@section('content')
    <div class="row">
        <div class="col-12 m-3">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Thank You!</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title">ご購入ありがとうございました。</h5>
                    <p class="card-text">
                    <form action="/History_Cart">
                        <button class="btn btn-link" value="{{Auth::user()->id}}" name="userid">購入履歴の確認</button>
                    </form>
                    <button class="btn btn-link"><a href="/">トップ画面へ戻る</a></button>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection