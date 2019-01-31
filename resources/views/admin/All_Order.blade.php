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
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search Clumn
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Order Id</button>
                                    <button class="dropdown-item" value="itemid" name="clumn">Item Id</button>
                                    <button class="dropdown-item" value="itemname" name="clumn">Item Name</button>
                                    <button class="dropdown-item" value="userid" name="clumn">User Id</button>
                                    <button class="dropdown-item" value="username" name="clumn">User Name</button>
                                    <button class="dropdown-item" value="cnt" name="clumn">Cnt</button>
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
                            <th class="text-center"><h4>ItemName</h4></th>
                            <th class="text-center"><h4>UserName</h4></th>
                            <th class="text-center"><h4>Cnt</h4></th>
                            <th class="text-center"><h4>Status</h4></th>
                            <th class="text-center"><h4>CreateDate</h4></th>
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
                                                        <input type="hidden" value="{{$searchclumn}}"
                                                               name="searchclumn">
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