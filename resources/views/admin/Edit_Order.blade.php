@extends('layouts.adminapp')

@section('content')
    <div class="row">

        <div class="col-12 m-3">
            <h3 class="text-center">Edit Order</h3>
        </div>
        <div class="m-3">
            <h5>受注に関する情報を作成・編集できます。</h5>
        </div>


        <table class="table table-borderless">
            <tbody>
            @foreach($order as $Order)
                <tr>
                    <th class="text-center">Order Id</th>
                    <th class="text-center">{{ $Order -> orderid }}</th>
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
                    <th class="text-center">{{ $Order -> post }}</th>
                </tr>
                <tr>
                    <th class="text-center">PayDate</th>
                    <th class="text-center">
                        @if( $Order->paydate <> null )
                            {{ $Order -> paydate -> format('Y年m月d日') }}
                        @endif
                    </th>
                </tr>
                <tr>
                    <th class="text-center">PayConfirmor</th>
                    <th class="text-center">{{ $Order -> pconfirmorid }}</th>
                </tr>
                <tr>
                    <th class="text-center">ShipDate</th>
                    <th class="text-center">
                        @if( $Order->shipdate <> null )
                            {{ $Order -> shipdate -> format('Y年m月d日') }}
                        @endif
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

        <div class="col-12">
            <input type="submit" value="保存" class="btn btn-block">
        </div>
    </div>
@endsection