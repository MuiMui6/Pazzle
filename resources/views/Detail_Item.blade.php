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
                        @if($items->height >= $items->width)
                            <img class="card-img-top" src="img/{{$items->name}}.jpg"
                                 style="height: 600px; width: 400px;">
                        @elseif($items->height < $items->width)
                            <img class="card-img-top" src="img/{{$items->name}}.jpg"
                                 style="height: 400px; width:600px;">
                        @endif
                    </div>
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
                    @guest
                        <div class="alert alert-danger text-lg-center col-12">
                            <p>購入していただくには<a href="/register">新規登録</a>または<a href="/login">ログイン</a>して頂く必要があります。</p>
                        </div>
                    @else
                        <form action="/Add_Cart" method="post">
                            @csrf
                            <input type="hidden" value="{{$items->id}}" name="itemid">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Cart Item Cnt</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="itemcnt">
                                    <option name="itemcnt" value="1">1点</option>
                                    <option name="itemcnt" value="2">2点</option>
                                    <option name="itemcnt" value="3">3点</option>
                                    <option name="itemcnt" value="4">4点</option>
                                    <option name="itemcnt" value="5">5点</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">購入</button>
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


                    @guest
                    @else
                        <form action="/Detail" method="post">
                            @csrf
                            <table class="table">
                                <tbody>
                                <th>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Evaluation</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="evaluation">
                                            <option name="evaluation" value="1">1</option>
                                            <option name="evaluation" value="2">2</option>
                                            <option name="evaluation" value="3">3</option>
                                            <option name="evaluation" value="4">4</option>
                                            <option name="evaluation" value="5">5</option>
                                        </select>
                                    </div>
                                </th>
                                <th>
                                    {{Auth::user()->name}}</th>
                                <th><textarea cols="50" rows="5" class="form-control" name="comment"></textarea>
                                </th>
                                <th>
                                    <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                    @foreach($item as $items)
                                        <input type="hidden" value="{{$items->id}}" name="itemid">
                                    @endforeach
                                    <button type="submit" class="btn btn-primary">投稿</button>
                                </th>
                                </tbody>
                            </table>
                        </form>

                    @endguest

                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <td><h3>Average Evakuation</h3></td>
                            <td><h3>{{$evaluation}}</h3></td>
                        </tr>
                        <tr>
                            <td>Evaluation</td>
                            <td>Name</td>
                            <td>Comment</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($itemcomments as $itemcomment)
                            <tr>
                                <td class="text-left">{{$itemcomment->evaluation}}</td>
                                <td class="text-left">{{$itemcomment->name}}</td>
                                <td class="text-left">{{$itemcomment->comment}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
@endsection