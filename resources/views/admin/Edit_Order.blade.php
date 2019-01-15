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
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">#</th>
            </tr>
            <tr>
                <th class="text-center">User</th>
                <th class="text-center"></th>
            </tr>
            <tr>
                <th class="text-center">Itemid</th>
                <th class="text-center"></th>
            </tr>
            <tr>
                <th class="text-center">Cnt</th>
                <th class="text-center"></th>
            </tr>
            <tr>
                <th class="text-center">AddressId</th>
                <th class="text-center"></th>
            </tr>
            <tr>
                <th class="text-center">Pay</th>
                <th class="text-center"><input type="submit" class="btn btn-block" value="支払い確認"></th>
            </tr>
            <tr>
                <th class="text-center">PayDate</th>
                <th class="text-center"></th>
            </tr>
            <tr>
                <th class="text-center">PayConfirmor</th>
                <th class="text-center"></th>
            </tr>
            <tr>
                <th class="text-center">Ship</th>
                <th class="text-center"><input type="submit" class="btn btn-block" value="出庫確認"></th>
            </tr>
            <tr>
                <th class="text-center">ShipDate</th>
                <th class="text-center"></th>
            </tr>
            <tr>
                <th class="text-center">ShipConfirmor</th>
                <th class="text-center"></th>
            </tr>
            <tr>
                <th class="text-center">Create_Date</th>
                <th class="text-center"></th>
            </tr>
            <tr>
                <th class="text-center">Updater</th>
                <th class="text-center"></th>
            </tr>
            <tr>
                <th class="text-center">Update_date</th>
                <th class="text-center"></th>
            </tr>
            </tbody>
        </table>

        <div class="col-12">
            <input type="submit" value="保存" class="btn btn-block">
        </div>
    </div>
@endsection