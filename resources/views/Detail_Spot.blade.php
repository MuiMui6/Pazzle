@extends('layouts.tripapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12 text-center">
            <div class="card-body">
                <img src="img/noimage.png" height="500px">


                @foreach($spots as $spot)
                    <h2 class="card-title m-2">{{$spot->spotname}}</h2>

                    <table class="table">

                        <tr>
                            <th class="text-center">
                                Profile
                            </th>
                            <th class="text-center">
                                {{$spot->profile}}
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
                            <th class="text-center">
                                Tag
                            </th>
                            <th class="text-center">
                                <p>
                                    @foreach($tag1 as $tag1)
                                        {{ $tag1->name }}
                                    @endforeach


                                    @foreach($tag2 as $tag2)
                                        {{ $tag2->name }}
                                    @endforeach


                                    @foreach($tag3 as $tag3)
                                        {{ $tag3->name }}
                                    @endforeach
                                </p>
                            </th>
                        </tr>
                    </table>


                    @if($spot->createrid == Auth::user()->id )
                        <form action="/Edit_Article" method="get">
                            <div class="col-12 m-3">
                                <button type="submit" class="btn btn-block" value="{{$spot->spotid}}" name="spotid">
                                    EDIT
                                </button>
                            </div>
                        </form>
                    @endif

                    <p class="small">
                        created_at:{{$spot->created_at->format('Y/m/d')}}
                        　/　updated_ad:{{$spot->updated_at->format('Y/m/d')}}
                        　/　by　{{$spot->creatername}}
                    </p>
                @endforeach


                {{--コメント--}}
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
                        <td><h3>{{$evaluation}}</h3></td>
                    </tr>
                    <tr>
                        <td>Evaluation</td>
                        <td>Name</td>
                        <td>Comment</td>
                    </tr>
                    <tr>

                        @guest
                        @else
                            <form action="/Detail_SpotComment" method="post">
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenu2"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            評価を選んでください
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <button class="dropdown-item" type="button" value="1"
                                                    name="evaluation">★
                                            </button>
                                            <button class="dropdown-item" type="button" value="2"
                                                    name="evaluation">★★
                                            </button>
                                            <button class="dropdown-item" type="button" value="3"
                                                    name="evaluation">★★★
                                            </button>
                                            <button class="dropdown-item" type="button" value="4"
                                                    name="evaluation">★★★★
                                            </button>
                                            <button class="dropdown-item" type="button" value="5"
                                                    name="evaluation">
                                                ★★★★★
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
                    @foreach($spotcomments as $spotcomment)
                        <tr>
                            <td class="text-left">{{$spotcomment->evaluation}}</td>
                            <td class="text-left">{{$spotcomment->name}}</td>
                            <td class="text-left">{{$spotcomment->comment}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection