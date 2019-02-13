@extends('layouts.notapp')


@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-lg-12 text-center m-3">
                    <h3>Confirmation Secret Key</h3>
                    <p>本人確認</p>
                </div>
                <form action="/Topost_Cart" method="post">
                    @csrf
                    <div class="col-lg-12 text-center m-3">
                        <p>ご登録時に登録した“Seacret Key”をご記入ください。</p>
                        <p class="text-danger">※3回間違えるとログアウトします。※</p>

                        <input type="password" name="secretkey" class="form-control">

                        <button type="submit" value="{{Auth::user()->id}}" name="userid"
                                class="btn btn-block btn-primary mt-3">
                            <input type="hidden" value="{{$itemcnt}}" name="itemcnt">
                            Certification　/　-　認証　-
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection