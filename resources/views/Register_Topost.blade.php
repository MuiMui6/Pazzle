@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="col-12 m-3">
            <h3 class="text-center">Register Topost</h3>
        </div>
        <div class="m-3">
            <h5>商品の発送先を決定します。</h5>
        </div>


        <div class="col-12">
            <form action="/New_Address">
                @csrf
                <input type="submit" class="btn btn-block" value="住所を追加する">
            </form>
        </div>

        <table class="table table-borderless">
            <tbody>
            <tr>
                <th class="text-center"><input type="radio"></th>
                <th class="text-center">
                    <p><h5>ToName</h5></p>
                    <p>〒000-0000</p>
                    <p>大阪府大阪市東淀川区</p>
                    <p>１－１－１</p>
                </th>
            </tr>
            </tbody>
        </table>

        <div class="col-12">
            <form action="/Register_Cart" method="post">
                @csrf
                <input type="submit" class="btn btn-block" value="購入確認">
            </form>
        </div>
    </div>
@endsection