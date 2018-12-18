@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 m-3">
                <h3 class="text-center">Confirmor Cart</h3>
            </div>
            <div class="m-3">
                <h5>カートに入っている商品を確認できます。</h5>
            </div>
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th class="text-center">ItemImage</th>
                    <th class="text-center">ItemName</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th class="text-center"><img src="img/spring.jpg" height="150px"></th>
                    <th class="text-center">商品名</th>
                    <th class="text-center">3000円</th>
                    <th class="text-center"><input type="submit" class="btn btn-danger" value="Delete"></th>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection