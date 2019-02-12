@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">Confirmation Cart</h3>
                    <p class="text-center">カート内確認</p>
                </div>
                <div class="col m-3">
                    <h5></h5>
                    <p>カートに入っている商品を確認できます。</p>
                </div>
                <div class="text-center">
                    <img src="img/s_line.png">
                </div>

                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th class="text-center">合計：{{$itemcnt}}点</th>
                        <th class="text-center">合計金額：{{$price}}円</th>
                        <th class="text-center">
                            <form action="/AllDelete_Cart" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">AllDelete</button>
                            </form>
                        </th>
                    </tr>
                    <tr>
                        <th class="text-center">ItemImage</th>
                        <th class="text-center">ItemName</th>
                        <th class="text-center">Cnt</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($CartItems as $index =>$item)

                        <tr>
                            <th class="text-center"><img src="img/{{$item->name}}.jpg" height="150px"></th>
                            <th class="text-center">{{$item->name}}</th>
                            <th class="text-center">{{$CartItemCnt[$index]}}</th>
                            <th class="text-center">{{$item->price}}円</th>
                            <th class="text-center">
                                <form action="/Delete_Cart" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$index}}" name="index">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </th>
                        </tr>

                    @endforeach
                    </tbody>
                </table>


                <div class="col-lg-12 m-3">
                    <form action="/Topost_Cart" method="post">
                        @csrf
                        <input type="text" class="form-control mb-3" name="secretkey" placeholder="Secret Key">
                        <input type="hidden" value="{{$itemcnt}}" name="itemcnt">
                        <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                        <input type="submit" class="btn btn-block btn-default" value="To Purchase Procedure">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection