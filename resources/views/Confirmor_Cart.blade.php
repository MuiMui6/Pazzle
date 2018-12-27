@extends('layouts.notapp')

@section('content')
    <div class="row">

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
            @foreach($cartItems as $index =>$item)
                <form action="/Confirmor_Cart" method="post">
                    <tr>
                        <th class="text-center"><img src="img/{{$item->name}}.jpg" height="150px"></th>
                        <th class="text-center">{{$item->name}}</th>
                        <th class="text-center">{{$item->price}}円</th>
                        <th class="text-center">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </th>
                    </tr>
                </form>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection