@extends('layouts.notapp')

@section('content')

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">
                <form action="/Registerd_Cart" method="post">
                    @csrf
                    <div class="col-12 m-3 text-center">
                        <h3>Last Confirmation Cart</h3>
                        <p>カート最終確認</p>
                    </div>
                    <div class="col-12 m-3">
                        <h5>You can confirm the final confirmation as accepting the order as follows.</h5>
                        <p>以下の通りに受注を受け付けて良いか、最終確認ができます。</p>
                    </div>

                    <div class="col-12 m-3 text-center">
                        <img src="img/s_line.png">
                    </div>

                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th class="text-center">TotalCnt</th>
                            <th class="text-center">{{$itemcnt}}点</th>
                        </tr>

                        <tr>
                            <th class="text-center">TotalPrice</th>
                            <th class="text-center">{{$price}}円</th>
                        </tr>
                        @foreach($address as $addresses)
                            <tr>
                                <th class="text-center">ToName</th>
                                <th class="text-center">{{$addresses->toname}}</th>
                            </tr>

                            <tr>
                                <th class="text-center">Address</th>
                                <th class="text-center">
                                    <p>〒{{substr($addresses->post,0,3)}}
                                        -{{substr($addresses->post,4,7)}}</p>
                                    <p>{{$addresses->add1}}</p>
                                    <p>{{$addresses->add2}}</p>
                                </th>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th class="text-center">ItemImage</th>
                            <th class="text-center">ItemName</th>
                            <th class="text-center">Cnt</th>
                            <th class="text-center">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($CartItems as $index => $items)
                            <tr>
                                <th class="text-center">
                                    @if($items->image == null)
                                        <img src="img/{{$items->name}}.jpg" height="150px">
                                    @else
                                        <img src="storage/items/{{$items->id}}/{{$items->image}}" height="150px">
                                    @endif
                                </th>
                                <th class="text-center">{{$items->name}}</th>
                                <th class="text-center">{{$CartItemCnt[$index]}}</th>
                                <th class="text-center">{{$items->price}}円</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="col-12">
                        <div class="m-3 alert alert-danger">
                            下のボタンをクリックすると購入が確定します。
                        </div>
                        <input type="hidden" value="{{$addid}}" name="addid">
                        <input type="hidden" value="{{$authsec}}" name="authsec">
                        <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                        <input type="submit" class="mb-3 btn btn-danger btn-block" value="Order!">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection