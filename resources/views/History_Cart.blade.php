@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-12 m-3">
            <h3 class="text-center">History Cart</h3>
        </div>
        <div class="m-3">
            <h5>購入履歴の確認ができます。</h5>
        </div>
        <table class="table table-borderless">
            <thead>
            <tr>
                <th class="text-center">Item Image</th>
                <th class="text-center">Item Name</th>
                <th class="text-center">Price</th>
                <th class="text-center">Cart Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th><img src="img/spring.jpg" height="150px"></th>
                <th>商品名</th>
                <th class="text-right">3000円</th>
                <th>0000/00/00</th>
            </tr>
            </tbody>
        </table>

    </div>
@endsection