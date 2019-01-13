@extends('layouts.notapp')

@section('content')
    <div class="row">

        <div class="col-12 m-3">
            <h3 class="text-center">History Cart</h3>
        </div>
        <div class="m-3">
            <h5>購入履歴の確認ができます。</h5>
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
                        {{$item->created_at->format('y年m月d日')}}
                    </th>

                    {{--Paydate--}}
                    @if($item->paydate == null && $item ->pconfirmorid == null)
                        <th class="text-center">
                            <form action="/History_Cart/Pay_Date" method="post">
                                @csrf
                                <button class="btn btn-info" type="submit">
                                    <input type="hidden" value="{{$item->orderid}}" name="orderid">
                                    支払完了申請
                                </button>
                            </form>
                        </th>
                    @elseif($item->paydate <> null || $item ->pconfirmorid == null)
                        <th class="text-center">
                            <p>支払確認中です。</p>
                            <p>しばらくお待ちください。</p>
                        </th>
                    @else
                        <th class="text-center">
                            {{$item->paydate->format('y年m月d日')}}
                        </th>
                    @endif

                    {{--Shipdate--}}

                    @if($item ->pconfirmorid == null )
                        <th class="text-center">
                        </th>
                    @elseif($item->pconfirmorid <> null && $item->sconfirmor == null)
                        <th class="text-center">
                            <button class="btn btn-info">
                                受取完了申請
                            </button>
                        </th>
                    @else
                        <th class="text-center">
                            {{$item->shipdate->format('y年m月d日')}}
                        </th>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection