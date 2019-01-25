@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All Order</h3>
                </div>
                <div class="m-3">
                    <h5>受注情報を確認・編集できます。</h5>
                </div>


                {{--検索--}}
                <div class="col-lg-12 m-3">
                    <form action="/admin/All_Order/Search" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control"
                                   placeholder="Item Id / Item Name / User Id / User Name / Updater Id" name="keyword">
                            <div class="input-group-append">
                                <button type="button"
                                        class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="orders.itemid" name="searchclumn">Item Id
                                    </button>
                                    <button class="dropdown-item" value="items.name" name="searchclumn">Item Name
                                    </button>
                                    <button class="dropdown-item" value="orders.userid" name="searchclumn">User Id
                                    </button>
                                    <button class="dropdown-item" value="users.name" name="searchclumn">User Name
                                    </button>
                                    <button class="dropdown-item" value="orders.updaterid" name="searchclumn">Updater Id
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                {{--期限まで--}}
                <div class="col-lg-12 m-3">
                    <form action="/admin/All_Order/Date" method="get">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th class="text-center">
                                    <input type="date" class="form-control col" name="startday">
                                </th>
                                <th class="text-center">
                                    <label class="text-center col">～</label>
                                </th>
                                <th class="text-center">
                                    <input type="date" class="form-control col" name="endday">
                                </th>
                                <th class="text-center">

                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown button
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" value="paydate" name="dateclumn"
                                                    type="submit">Unpaid
                                            </button>
                                            <button class="dropdown-item" value="paydate" name="dateclumn"
                                                    type="submit">Paid
                                            </button>
                                            <button class="dropdown-item" value="shipdate" name="dateclumn"
                                                    type="submit">Unshipped
                                            </button>
                                            <button class="dropdown-item" value="shipdate" name="dateclumn"
                                                    type="submit">Shipped
                                            </button>
                                            <button class="dropdown-item" value="created_at" name="dateclumn"
                                                    type="submit">CreateDate
                                            </button>
                                            <button class="dropdown-item" value="updated_at" name="dateclumn"
                                                    type="submit">UpdateDate
                                            </button>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>

            <div class="justify-content-center m-3">
                {!! $orders->appends(Request::query())->links() !!}
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th class="text-center"><h4>ItemName</h4></th>
                    <th class="text-center"><h4>UserName</h4></th>
                    <th class="text-center"><h4>Cnt</h4></th>
                    <th class="text-center"><h4>Status</h4></th>
                    <th class="text-center"><h4>CreateDate</h4></th>
                    <th class="text-center"><h4>Updater</h4></th>
                    <th class="text-center"><h4>UpdateDate</h4></th>
                    <th class="text-center"><h4>Detail</h4></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th class="text-center">{{ $order -> itemname }}</th>
                        <th class="text-center">{{ $order -> username }}</th>
                        <th class="text-center">{{ $order -> cnt }}</th>
                        <th class="text-center m-3">
                            @if( $order -> paydate == null && $order -> pconfirmorid == null)
                                <div class="alert alert-danger">
                                    未払
                                </div>
                            @elseif( $order -> paydate <> null && $order -> pconfirmorid == null )
                                <div class="dropdown">
                                    <a class="btn btn-warning dropdown-toggle" href="#" role="button"
                                       id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        支払確認待ち
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <form action="/admin/All_Order/PayConfirmation" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $order -> id }}" name="orderid">
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="userid">
                                            @if($vkeyword <> null)
                                                <input type="hidden" value="{{$vkeyword}}" name="vkeyword">
                                                <input type="hidden" value="{{$searchclumn}}" name="searchclumn">
                                            @endif
                                            <button class="dropdown-item" type="submit">支払い確認</button>
                                        </form>
                                    </div>
                                </div>
                            @elseif( $order -> shipdate == null )
                                <div class="alert alert-success">
                                    受取確認待ち
                                </div>
                            @elseif( $order -> shipdate <> null )
                                <div class="alert alert-light">
                                    受取確認済
                                </div>
                            @endif
                        </th>
                        <th class="text-center">{{ $order -> created_at -> format('y年m月d日') }}</th>
                        <th class="text-center">{{ $order -> updaterid }}</th>
                        <th class="text-center">
                            {{--更新日予定--}}
                        </th>
                        <th class="text-center">
                            <form action="/admin/Edit_Order" method="get">
                                <button class="btn btn-primary" value="{{$order->id}}" name="orderid">
                                    Detail
                                </button>
                            </form>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection