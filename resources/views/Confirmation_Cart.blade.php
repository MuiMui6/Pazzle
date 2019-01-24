@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">Confirmaion Cart</h3>
                </div>
                <div class="m-3">
                    <h5>カートに入っている商品を確認できます。</h5>
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


                <div class="col-lg-12">
                    <form action="/Topost_Cart" method="post">
                        @csrf
                        <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                        <input type="submit" class="btn btn-block btn-default" value="購入手続きへ">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection