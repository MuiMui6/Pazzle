@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">

        @if($message <> null)
            <div class="alert alert-success m-3">
                <p>{{$message}}</p>
            </div>
        @endif

        @foreach($item as $items)
            @if($items->height >= $items->width)
                <img class="card-img-top" src="img/{{$items->name}}.jpg" style="height: 600px; width: 400px;">
            @elseif($items->height < $items->width)
                <img class="card-img-top" src="img/{{$items->name}}.jpg" style="height: 400px; width:auto;">
            @endif
            <div class="col-12 m-3">
                <h3 class="text-center">{{$items->name}}</h3>
            </div>
            <div class="m-3">
                <h5>「{{$items->name}}」の商品情報です。</h5>
            </div>
            <table class="table table-borderless text-center">
                <tbody>
                {{--紹介文--}}
                <tr>
                    <th scope="row">Profile</th>
                    <td>{{$items->profile}}</td>
                </tr>

                {{--サイズ--}}
                <tr>
                    <th scope="row">Size</th>
                    <td>{{$items->height}}×{{$items->width}}（mm）</td>
                </tr>

                {{--ピース数--}}
                <tr>
                    <th scope="row">PeasCnt</th>
                    <td>{{$items->cnt}}peas</td>
                </tr>

                {{--観光地--}}
                <tr>
                    <th scope="row">Spot</th>
                    <td></td>
                </tr>

                </tbody>
            </table>
            <p class="card-text">
                <div class="col-12 text-center">

                    @guest
                        <div class="alert alert-danger m-3">
                            <p>ログインしないと購入していただけません。</p>
                        </div>
                    @else
                        <form action="/Add_Cart" method="post">
                            @csrf
                            <input type="hidden" value="{{$items->itemid}}" name="itemid">
                            <input type="submit" class="btn btn-block btn-info m-3" value="カートに入れる">
                        </form>
                    @endguest
                </div>
        <small class="text-muted">Tag1,Tag2,Tag3</small>
        </p>

        <div class="col-12 m-3">
            <h3 class="text-center">Comment</h3>
        </div>
        <div class="m-3">
            <h5>「ItemName」のコメント一覧です。</h5>
        </div>
        <table class="table table-borderless">
            <thead>
            <tr>
                <td><h3>Average Evakuation</h3></td>
                <td><h3>3.0</h3></td>
            </tr>
            <tr>
                <td>Evakuation</td>
                <td>Name</td>
                <td>Comment</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-left">3.0</td>
                <td class="text-left">投稿者</td>
                <td class="text-left">コメント文コメント文コメント文</td>
            </tr>
            </tbody>
        </table>
        @endforeach
        </div>
@endsection