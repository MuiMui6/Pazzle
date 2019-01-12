@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">

        @if($message <> null)
            <div class="alert alert-success m-3 col-12">
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

                {{--Tag--}}
                <tr>
                    <th scope="row">Tag</th>
                    <td>Tag1,Tag2,Tag3</td>
                </tr>

                {{--観光地--}}
                <tr>
                    <th scope="row">Spot</th>
                    <td></td>
                </tr>

                </tbody>
            </table>
            @guest
                <div class="alert alert-danger text-lg-center col-12">
                    <p>購入していただくには<a href="/register">新規登録</a>または<a href="/login">ログイン</a>して頂く必要があります。</p>
                </div>
            @else
                <form action="/Add_Cart" method="post">
                    @csrf
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="0" name="itemcnt">
                            Cart Count
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <button class="dropdown-item" value="1" name="itemcnt">1点</button>
                            <button class="dropdown-item" value="2" name="itemcnt">2点</button>
                            <button class="dropdown-item" value="3" name="itemcnt">3点</button>
                        </div>
                    </div>
                    <input type="hidden" value="{{$items->itemid}}" name="itemid">
                    <input type="submit" class="btn btn-block btn-info m-3" value="カートに入れる">
                </form>
            @endguest

            <div class="col-12 m-3">
                <h3 class="text-center">Comment</h3>
            </div>

            @guest
                <div class="alert alert-info text-lg-center col-12">
                    コメントするには<a href="/register">新規登録</a>または<a href="/login">ログイン</a>していただく必要があります。
                </div>
            @endguest

            <table class="table table-borderless">
                <thead>
                <tr>
                    <td><h3>Average Evakuation</h3></td>
                    <td><h3>3.0</h3></td>
                </tr>
                <tr>
                    <td>Evaluation</td>
                    <td>Name</td>
                    <td>Comment</td>
                </tr>
                <tr>

                    @guest
                    @else
                        <form action="/Detail_ItemComment" method="post">
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        評価を選んでください
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <button class="dropdown-item" type="button" value="1" name="evaluation">★
                                        </button>
                                        <button class="dropdown-item" type="button" value="2" name="evaluation">★★
                                        </button>
                                        <button class="dropdown-item" type="button" value="3" name="evaluation">★★★
                                        </button>
                                        <button class="dropdown-item" type="button" value="4" name="evaluation">★★★★
                                        </button>
                                        <button class="dropdown-item" type="button" value="5" name="evaluation">★★★★★
                                        </button>
                                    </div>
                                </div>

                            </td>
                            <td>
                                {{Auth::user()->name}}</td>
                            <td><textarea cols="50" rows="5" class="form-control"></textarea></td>
                            <td><input type="submit" value="投稿" class="btn btn-info"></td>
                        </form>
                    @endguest
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