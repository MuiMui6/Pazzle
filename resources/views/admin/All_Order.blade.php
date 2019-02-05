@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All Order</h3>
                    <p class="text-center">受注一覧</p>
                </div>
                <div class="m-3">
                    <h5>I can manage the information about the sightseeing order.</h5>
                    <p>受注に関する情報を管理することが出来ます。</p>
                </div>


                {{--検索--}}
                <div class="col-lg-12 m-3">

                    <form action="/admin/All_Order/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search Clumn　/　検索項目
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Order Id　/　受注ID</button>
                                    <button class="dropdown-item" value="itemid" name="clumn">Item Id　/　商品ID</button>
                                    <button class="dropdown-item" value="itemname" name="clumn">Item Name　/　商品名</button>
                                    <button class="dropdown-item" value="userid" name="clumn">User Id　/　ユーザID</button>
                                    <button class="dropdown-item" value="username" name="clumn">User Name　/　ユーザ名</button>
                                    <button class="dropdown-item" value="cnt" name="clumn">Cnt　/　個数</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="justify-content-center m-3">
                    {!! $orders->appends(Request::query())->links() !!}
                </div>

                <div class="col-lg-12 m-3">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">
                                <h5>Order ID</h5>
                                <p>受注ID</p>
                            </th>
                            <th class="text-center">
                                <h5>Item Name</h5>
                                <p>商品名</p>
                            </th>
                            <th class="text-center">
                                <h5>User Name</h5>
                                <p>ユーザ名</p>
                            </th>
                            <th class="text-center">
                                <h5>Cnt</h5>
                                <p>個数</p>
                            </th>
                            <th class="text-center">
                                <h5>Status</h5>
                                <p>状態</p>
                            </th>
                            <th class="text-center">
                                <h5>Created Date</h5>
                                <p>作成日</p>
                            </th>
                            <th class="text-center">
                                <h5>Updated Date</h5>
                                <p>更新日</p>
                            </th>
                            <th class="text-center">
                                <h5>Detail</h5>
                                <p>詳細</p>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th class="text-center">{{ $order -> id }}</th>
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
                                                    <button class="dropdown-item" type="submit">支払確認</button>
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
        </div>
    </div>
@endsection