@if(Auth::user()->rank == 1)
    @extends('layouts.adminapp')
@else
    @extends('layouts.notapp')
@endif


@section('content')
    <form action="/Registerd_Cart" method="post">
        @csrf
        <div class="row">
            <div class="col-12 m-3">
                <h3 class="text-center">Register Cart</h3>
            </div>
            <div class="m-3">
                <h5>商品の購入確認です。</h5>
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
                        <th class="text-center">宛先</th>
                        <th class="text-center">
                            <p>〒{{$addresses->post}}</p>
                            <p>{{$addresses->add1}}</p>
                            <p>{{$addresses->Add2}}</p>
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
                        <th class="text-center"><img src="img/{{$items->name}}.jpg" height="150px"></th>
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
                <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                <input type="submit" class="mb-3 btn btn-block" value="購入">
            </div>
        </div>
    </form>
@endsection