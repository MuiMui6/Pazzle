@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">Edit Order</h3>
                </div>
                <div class="col-12 text-center m-3">
                    <h5>受注に関する情報を作成・編集できます。</h5>
                </div>

                @if($deletemessage)
                    <div class="col-12 text-center alert alert-danger">
                        {{$deletemessage}}
                    </div>
                @endif

                <table class="table">
                    <tbody>
                    @foreach($order as $Order)
                        <tr>
                            <th class="text-center">Order Id</th>
                            <th class="text-center">{{ $Order -> id }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">User</th>
                            <th class="text-center">{{ $Order -> username }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">Item</th>
                            <th class="text-center">{{ $Order -> itemname }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">Cnt</th>
                            <th class="text-center">{{ $Order -> cnt }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">Address</th>
                            <th class="text-center">
                                <p>{{$Order->toname}}</p>
                                <p>〒{{$Order->post}}</p>
                                <p>{{$Order->add1}}</p>
                                <p>{{$Order->add2}}</p>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">PayDate</th>
                            <th class="text-center">
                                @if( $Order->paydate <> null )
                                    {{ $Order -> paydate -> format('Y年m月d日') }}
                                @endif
                            </th>
                            <th class="text-center">
                                <form action="/admin/Edit_Order/Delete" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$Order->orderid}}" name="orderid">
                                    <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                    <input type="hidden" value="paydate" name="clumn">
                                    <button class="btn btn-danger">Reset</button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">PayConfirmor</th>
                            <th class="text-center">{{ $Order -> pconfirmorid }}</th>
                            <th class="text-center">
                                <form action="/admin/Edit_Order/Delete" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$Order->orderid}}" name="orderid">
                                    <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                    <input type="hidden" value="pconfirmorid" name="clumn">
                                    <button class="btn btn-danger">Reset</button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">ShipDate</th>
                            <th class="text-center">
                                @if( $Order->shipdate <> null )
                                    {{ $Order -> shipdate -> format('Y年m月d日') }}
                                @endif
                            </th>
                            <th class="text-center">
                                <form action="/admin/Edit_Order/Delete" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$Order->orderid}}" name="orderid">
                                    <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                    <input type="hidden" value="shipdate" name="clumn">
                                    <button class="btn btn-danger">Reset</button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">Create_Date</th>
                            <th class="text-center">
                                {{ $Order -> created_at -> format('Y年m月d日') }}
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">Updater</th>
                            <th class="text-center">{{ $Order -> updaterid }}
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">Update_date</th>
                            <th class="text-center">
                                {{ $Order -> updated_at -> format('Y年m月d日') }}
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection