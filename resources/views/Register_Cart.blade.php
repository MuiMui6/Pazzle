@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="col-12 m-3">
            <h3 class="text-center">Register Cart</h3>
        </div>
        <div class="m-3">
            <h5>商品の購入確認です。</h5>
        </div>

        <table class="table table-borderless">
            <tbody>
            <tr>
                <th class="text-center">TotalCnt</th>
                <th class="text-center">点</th>
            </tr>

            <tr>
                <th class="text-center">TotalPrice</th>
                <th class="text-center">円</th>
            </tr>

            <tr>
                <th class="text-center">ToName</th>
                <th class="text-center"></th>
            </tr>

            <tr>
                <th class="text-center">宛先</th>
                <th class="text-center">
                    <p><h5>ToName</h5></p>
                    <p>〒000-0000</p>
                    <p>大阪府大阪市東淀川区</p>
                    <p>１－１－１</p>
                </th>
            </tr>

            </tbody>
        </table>

        <table class="table table-borderless">
            <thead>
            <tr>
                <th class="text-center">ItemImage</th>
                <th class="text-center">ItemName</th>
                <th class="text-center">Price</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="text-center"><img src="img/spring.jpg" height="150px"></th>
                <th class="text-center">商品名</th>
                <th class="text-center">3000円</th>
            </tr>
            </tbody>
        </table>

        <div class="col-12">
            <div class="m-3 alert alert-danger">
                下のボタンをクリックすると購入が確定します。
            </div>
            <input type="submit" class="mb-3 btn btn-block" value="購入">
        </div>
    </div>
@endsection