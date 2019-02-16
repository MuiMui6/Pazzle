@extends('layouts.tripapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12 text-center">
            <div class="card-body">

                @foreach($spots as $spot)
                    @if($spot->image == null)
                        <img src="img/noimage.png" height="500px">
                    @else
                        <img src="/storage/spots/{{$spot->id}}/{{$spot->image}}" height="500px">
                    @endif

                    <h2 class="card-title m-2">{{$spot->spotname}}</h2>

                    <table class="table m-3">

                        <tr>
                            <th class="text-center">
                                Article
                            </th>
                            <th class="text-center">
                                {{$spot->article}}
                            </th>
                        </tr>

                        <tr>
                            <th class="text-center">
                                URL
                            </th>
                            <th class="text-center">
                                <a href="{{$spot->url}}">{{$spot->url}}</a>
                            </th>
                        </tr>

                        <tr>
                            <th class="text-center">
                                Tel
                            </th>
                            <th class="text-center">
                                {{$spot->tel}}
                            </th>
                        </tr>

                        <tr>
                            <th class="text-center">
                                Address
                            </th>
                            <th class="text-center">
                                <p>〒{{$spot->post}}</p>
                                <p>{{$spot->add1}}</p>
                                <p>{{$spot->add2}}</p>
                            </th>
                        </tr>


                        <tr>
                        <tr>
                            <th scope="row">
                                <p>Item Tag</p>
                                <p>※クリックするとパズルECサイトに移行します</p>
                            </th>
                            <td class="form-inline">
                                <form action="/" method="get">
                                    @csrf
                                    <button class="btn btn-link" name="keyword"
                                            value="{{$spot->tag1}}">{{$spot->tag1}}</button>
                                    <button class="btn btn-link" name="keyword"
                                            value="{{$spot->tag2}}">{{$spot->tag2}}</button>
                                    <button class="btn btn-link" name="keyword"
                                            value="{{$spot->tag3}}">{{$spot->tag3}}</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                    @guest
                    @elseguest
                        @if($spot->createrid == Auth::user()->id )
                            <form action="/Edit_Article" method="get">
                                <div class="col-12 m-3">
                                    <button type="submit" class="btn btn-block" value="{{$spot->id}}" name="spotid">
                                        EDIT
                                    </button>
                                </div>
                            </form>
                        @endif
                    @endguest

                    <p class="small">
                        createDate:{{$spot->created_at->format('Y/m/d')}}
                        　/　updateDate:{{$spot->updated_at->format('Y/m/d')}}
                        　/　by　{{$spot->creatername}}
                    </p>
                @endforeach


                {{--コメント--}}
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

                <form action="/Detail_SpotComment" method="post">
                    @csrf
                    <table class="table">
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
                        @guest
                        @else
                            <th>
                                {{Auth::user()->name}}</th>
                            <th>
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1"
                                            name="evaluation">
                                        <option name="evaluation" value="1">1</option>
                                        <option name="evaluation" value="2">2</option>
                                        <option name="evaluation" value="3">3</option>
                                        <option name="evaluation" value="4">4</option>
                                        <option name="evaluation" value="5">5</option>
                                    </select>
                                </div>
                            </th>
                            <th><textarea cols="30" rows="5" class="form-control" name="comment"></textarea>
                            </th>
                            <th>
                                <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                @foreach($spots as $spot)
                                    <input type="hidden" value="{{$spot->id}}" name="spotid">
                                @endforeach
                                <button type="submit" class="btn btn-primary">Post / 投稿</button>
                            </th>
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
                    @foreach($spotcomments as $spotcomment)
                        <tr class="text-center">
                            <td>{{$spotcomment->name}}</td>
                            <td>{{$spotcomment->evaluation}}</td>
                            <td>{{$spotcomment->comment}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection