@extends('layouts.notapp')


@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3 text-center">
                    <h3>Register Topost</h3>
                    <p>宛先登録</p>
                </div>
                <div class="col-12 m-3">
                    <h5>We will decide the shipping address of the item.</h5>
                    <p>商品の発送先を決定します。</p>
                </div>

                <div class="col-12 m-3 text-center">
                    <img src="img/s_line.png">
                </div>

                <div class="col-12">
                    <form action="/Register_Address" method="get">
                        @csrf
                        <input type="hidden" value="{{$authsec}}" name="authsec">
                        <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                        <button type="submit" class="btn btn-danger btn-block">
                            New Address　/　住所追加
                        </button>
                    </form>

                </div>


                <div class="col-12">
                    <form action="/Register_Cart" method="post">
                        @csrf
                        <table class="table table-borderless">
                            <tbody>
                            @foreach($address as $addindex => $addresses)
                                <tr>
                                    <th class="text-center"><input type="radio" value="{{$addresses->id}}"
                                                                   name="addressid">
                                    </th>
                                    <th class="text-center">
                                        <p><h5>{{$addresses->toname}}</h5></p>
                                        <p>〒{{substr($addresses->post,0,3)}} - {{substr($addresses->post,4,7)}}</p>
                                        <p>{{$addresses->add1}}　{{$addresses->add2}}</p>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <input type="hidden" value="{{$authsec}}" name="authsec">
                        <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                        <button type="submit" class="btn btn-block">
                            Confirmation Cart /　最終確認
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection