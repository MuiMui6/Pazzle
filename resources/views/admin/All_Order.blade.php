@extends('layouts.adminapp')

@section('content')
    <div class="row">

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
                    <input type="text" class="form-control" placeholder="itemid / userid / updateid" name="keyword">
                    <div class="input-group-append">
                        <button type="button"
                                class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item" value="itemid" name="searchclumn">Item Id</button>
                            <button class="dropdown-item" value="userid" name="searchclumn">User Id</button>
                            <button class="dropdown-item" value="updaterid" name="searchclumn">Updater Id</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{--期限まで--}}
        <div class="input-group m-3">
            <form action="/admin/All_Order/Date" method="get">
                <div class="col-lg-9">
                    <input type="date" class="col form-control" name="startday">
                    <label class="col text-center">～</label>
                    <input type="date" class="col form-control" name="endday">
                </div>

                <div class="col-lg-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Date Conditions
                    </button>
                    <div class="dropdown-menu">
                        <button class="dropdown-item" value="paydate" name="dateclumn">Unpaid</button>
                        <button class="dropdown-item" value="paydate" name="dateclumn">Paid</button>
                        <button class="dropdown-item" value="shipdate" name="dateclumn">Unshipped</button>
                        <button class="dropdown-item" value="shipdate" name="dateclumn">Shipped</button>
                        <button class="dropdown-item" value="created_at" name="dateclumn">Created</button>
                        <button class="dropdown-item" value="updated_at" name="dateclumn">Updated</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    </div>

    <table class="table table">
        <thead>
        <tr>
            <th class="text-center">ItemId</th>
            <th class="text-center">UserId</th>
            <th class="text-center">Cnt</th>
            <th class="text-center">Status</th>
            <th class="text-center">Create_date</th>
            <th class="text-center">Updater</th>
            <th class="text-center">Update_date</th>
            <th class="text-center">Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th class="text-center">{{ $order -> itemid }}</th>
                <th class="text-center">{{ $order -> userid }}</th>
                <th class="text-center">{{ $order -> cnt }}</th>
                <th class="text-center m-3">
                    @if( $order -> paydate == null && $order -> pconfirmorid == null)
                        <div class="alert alert-danger">
                            未払
                        </div>
                    @elseif( $order -> paydate <> null && $order -> pconfirmorid == null )
                        <div class="dropdown">
                            <a class="btn btn-warning dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                支払確認待ち
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <form action="/admin/All_Order/PayConfirmation" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $order -> orderid }}" name="orderid">
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="userid">
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
                <th class="text-center">{{ $order -> updated_at -> format('y年m月d日') }}</th>
                <th class="text-center">
                    <form action="/admin/Edit_Order" method="get">
                        <button class="btn btn-info" value="{{$order->orderid}}" name="orderid">
                            Edit
                        </button>
                    </form>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>
@endsection