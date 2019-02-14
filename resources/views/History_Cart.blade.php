@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3 text-center">
                    <h3>History Cart</h3>
                    <p>購入履歴</p>
                </div>
                <div class="col-12 m-3">
                    <h5></h5>
                    <p>購入履歴の確認・購入した商品に関する取引が行えます。</p>
                </div>

                <div class="col-12 m-3 text-center">
                    <img src="img/s_line.png">
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">Item Name</th>
                        <th class="text-center">Cnt</th>
                        <th class="text-center">All Price</th>
                        <th class="text-center">Cart Date</th>
                        <th class="text-center">Pay Date</th>
                        <th class="text-center">Ship Date</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($items as $item)
                        <tr>
                            {{--ItemName--}}
                            <th class="text-center">
                                {{$item->name}}
                            </th>


                            {{--Cnt--}}
                            <th class="text-center">
                                {{$item->cnt}}
                            </th>


                            {{--Price--}}
                            <th class="text-center">
                                {{$item->cnt * $item->price}}
                            </th>


                            {{--CartDate--}}
                            <th class="text-center">
                                {{$item->created_at->format('Y年m月d日')}}
                            </th>


                            {{--Paydate--}}
                            @if($item->paydate == null && $item ->pconfirmorid == null)
                                <th class="text-center">
                                    <form action="/History_Cart/PayDate" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$item->id}}" name="orderid">
                                        <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                        <button class="btn btn-info" type="submit">
                                            支払完了申請
                                        </button>
                                    </form>
                                </th>

                            @elseif($item->paydate <> null && $item ->pconfirmorid == null)

                                <th class="text-center">
                                    <p>支払確認中です。</p>
                                    <p>しばらくお待ちください。</p>
                                </th>

                            @elseif(($item -> shipdate == null && $item->pconfirmorid <> null) || ($item -> shipdate <> null && $item->pconfirmorid <> null))

                                <th class="text-center">
                                    {{ $item -> paydate->format('Y年m月d日') }}
                                </th>

                            @endif



                            {{--Shipdate--}}
                            @if($item -> shipdate == null && $item -> pconfirmorid == null)

                                <th class="text-center"></th>

                            @elseif($item -> shipdate == null && $item -> pconfirmorid <> null)
                                <th class="text-center">
                                    <form action="/History_Cart/Ship_Date_Confirmation" method="post">
                                        @csrf
                                        <button class="btn btn-info" type="submit">
                                            <input type="hidden" value="{{$item->id}}" name="orderid">
                                            <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                            受取完了申請
                                        </button>
                                    </form>
                                </th>

                            @elseif($item -> shipdate <> null)

                                <th class="text-center">
                                    {{ $item -> shipdate->format('Y年m月d日') }}
                                </th>

                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $items->appends(Request::query())->links() !!}

            </div>
        </div>
    </div>
@endsection