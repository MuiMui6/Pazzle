@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-lg-12">
            <div class="card-body">

                @if($message <> null)
                    <div class="alert alert-success m-3 col-12">
                        <p>{{$message}}</p>
                    </div>
                @endif

                @foreach($item as $items)
                    <div class="col-lg-12 m-3 text-center">
                        @if($items->image == null)
                            @if($items->height >= $items->width)
                                <img class="card-img-top" src="img/{{$items->name}}.jpg"
                                     style="height: 600px; width: 450px;">
                            @elseif($items->height < $items->width)
                                <img class="card-img-top" src="img/{{$items->name}}.jpg"
                                     style="height: 450px; width:600px;">
                            @endif
                        @else
                            @if($items->height >= $items->width)
                                <img class="card-img-top" src="/storage/items/{{$items->id}}/{{$items->image}}"
                                     style="height: 600px; width: 450px;">
                            @elseif($items->height < $items->width)
                                <img class="card-img-top" src="/storage/items/{{$items->id}}/{{$items->image}}"
                                     style="height: 400px; width:650px;">
                            @endif
                        @endif
                    </div>
                    <div class="col-12 m-3">
                        <h3 class="text-center">{{$items->name}}</h3>
                    </div>
                    <div class="m-3">
                        <h5>「{{$items->name}}」の商品情報です。</h5>
                    </div>
                    <table class="table text-left mr-5">
                        <tbody>
                        {{--紹介文--}}
                        <tr>
                            <th scope="row" class="text-center">Profile</th>
                            <td>{{$items->profile}}</td>
                        </tr>

                        {{--サイズ--}}
                        <tr>
                            <th scope="row" class="text-center">Size</th>
                            <td>{{$items->height}}×{{$items->width}}（mm）</td>
                        </tr>

                        {{--ピース数--}}
                        <tr>
                            <th scope="row" class="text-center">PeasCnt</th>
                            <td>{{$items->cnt}}peas</td>
                        </tr>

                        {{--タグ--}}
                        <tr>
                            <th scope="row" class="text-center">
                                <p>Spot Tag</p>
                                <p>※クリックすると観光サイトに移行します</p>
                            </th>
                            <td class="form-inline">
                                <form action="/Spotindex" method="get">
                                    @csrf
                                    <button class="btn btn-link" name="keyword"
                                            value="{{$items->tag1}}">{{$items->tag1}}</button>
                                    <button class="btn btn-link" name="keyword"
                                            value="{{$items->tag2}}">{{$items->tag2}}</button>
                                    <button class="btn btn-link" name="keyword"
                                            value="{{$items->tag3}}">{{$items->tag3}}</button>
                                </form>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    @guest
                        <div class="alert alert-danger text-lg-center col-12">
                            <p>購入していただくには<a href="/register">新規登録</a>または<a href="/login">ログイン</a>して頂く必要があります。</p>
                        </div>
                    @else
                        @if(Auth::user()->rank <> 2)
                            <form action="/Add_Cart" method="post">
                                @csrf
                                <input type="hidden" value="{{$items->id}}" name="itemid">
                                <div class="form-group">
                                    <h5><label for="exampleFormControlSelect1">Cart Item Cnt　/　購入個数</label></h5>
                                    <select class="form-control" id="exampleFormControlSelect1" name="itemcnt">
                                        <option name="itemcnt" value="1">1点</option>
                                        <option name="itemcnt" value="2">2点</option>
                                        <option name="itemcnt" value="3">3点</option>
                                        <option name="itemcnt" value="4">4点</option>
                                        <option name="itemcnt" value="5">5点</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mb-4">Purchase　/　購入</button>
                            </form>
                        @else
                            <div class="alert alert-danger text-lg-center col-12">
                                <p>現在アカウント停止中のため、購入できません。</p>
                            </div>
                        @endif
                    @endguest


                    <div class="col-lg-12 text-center" style="margin-top: 150px">
                        <img src="img/s_line.png">
                    </div>

                    <div class="col-12 m-3 mt-4">
                        <h3 class="text-center">Comment　/　コメント</h3>
                    </div>
                        <div class="text-center">
                            <h5>Average Evakuation</h5>
                            <p>平均評価</p>
                            <h3>{{$evaluation}}</h3>
                        </div>

                    @guest
                        <div class="alert alert-info text-lg-center col-12">
                            コメントするには<a href="/register">新規登録</a>または<a href="/login">ログイン</a>していただく必要があります。
                        </div>
                    @endguest


                    @guest
                    @else

                        <form action="/Detail" method="post">
                            @csrf
                            <table class="table text-center">
                                <thead>
                                <tr>
                                    <td>
                                        <h5><p>Name</p></h5>
                                        <h5><p>名前</p></h5>
                                    </td>
                                    <td>
                                        <h5><p>Evaluation</p></h5>
                                        <h5><p>評価</p></h5>
                                    </td>
                                    <td>
                                        <h5><p>Comment</p></h5>
                                        <h5><p>コメント文</p></h5>
                                    </td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                <th>{{Auth::user()->name}}</th>
                                <th>
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="evaluation">
                                            <option name="evaluation" value="1">1</option>
                                            <option name="evaluation" value="2">2</option>
                                            <option name="evaluation" value="3">3</option>
                                            <option name="evaluation" value="4">4</option>
                                            <option name="evaluation" value="5">5</option>
                                        </select>
                                    </div>
                                </th>
                                <th><textarea cols="40" rows="5" class="form-control" name="comment"></textarea></th>
                                <th>
                                    <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                    @foreach($item as $items)
                                        <input type="hidden" value="{{$items->id}}" name="itemid">
                                    @endforeach
                                    <button type="submit" class="btn btn-primary">Post　/ 投稿</button>
                                </th>
                                </tbody>
                            </table>
                        </form>

                    @endguest

                    <table class="table">
                        <thead>
                        <tr class="text-center">
                            <td><h5>Name / 名前</h5></td>
                            <td><h5>Evaluation / 評価</h5></td>
                            <td><h5>Comment / コメント文</h5></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($itemcomments as $itemcomment)
                            <tr class="text-center">
                                <td>{{$itemcomment->name}}</td>
                                <td>{{$itemcomment->evaluation}}</td>
                                <td>{{$itemcomment->comment}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
@endsection