@extends('layouts.notapp')

@section('content')

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3 text-center">
                    <h3>Register Address</h3>
                    <p>住所一覧</p>
                </div>
                <div class="col-12 m-3">
                    <h5>You can register your address.</h5>
                    <p>住所の登録が出来ます。</p>
                </div>


                <div class="col-12 m-3 text-center">
                    <img src="img/s_line.png">
                </div>

                <form action="/Register_Address" method="post">
                    @csrf
                    <table class="table table-borderless">
                        <tbody>
                        {{--宛先名--}}
                        <tr>
                            <th class="text-center" scope="row">ToName</th>
                            <th><input type="text" class="form-control" name="toname" placeholder="配送時、こちらの名前で配送します">
                            </th>
                        </tr>

                        {{--郵便番号--}}
                        <tr>
                            <th class="text-center" scope="row">Post</th>
                            <th class="form-inline">
                                〒　<input type="text" class="form-control" name="post" placeholder="例）1234567">
                            </th>
                        </tr>

                        {{--アドレス１--}}
                        <tr>
                            <th class="text-center" scope="row">Address1</th>
                            <th>
                                <input type="text" class="form-control" name="add1" placeholder="都道府県　市区町村　を記入してください">
                            </th>
                        </tr>

                        {{--アドレス２--}}
                        <tr>
                            <th class="text-center" scope="row">Address2</th>
                            <th>
                                <input type="text" class="form-control" name="add2" placeholder="番地　マンション名　部屋番号　を記入してください">
                            </th>
                        </tr>

                        {{--保存--}}
                        <tr>
                            <th scope="row"></th>
                            <th>
                                <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                <input type="hidden" value="{{$authsec}}" name="authsec">
                                <button type="submit" class="btn btn-info">
                                Save　/　保存
                                </button>
                            </th>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection