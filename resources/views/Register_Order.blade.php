@extends('layouts.notapp')

@section('content')

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">Original Item Order</h3>
                    <p class="text-center">オリジナル商品注文</p>
                </div>
                <div class="col-lg-12 m-3">
                    <h5>You can upload images, puzzle and order.</h5>
                    <p>画像をアップロードし、パズル化・注文することができます。</p>
                </div>

                <form action="/Register_Order/Add" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th class="text-center">Image</th>
                            <th class="text-left">
                                <p>
                                    <input type="file" name="img" enctype="multipart/form-data">
                                </p>
                                <p>画像ファイル( jpg / png / bmp / gif / svg )のみしか登録できません。</p>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">Size</th>
                            <th class="text-center">
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1" name="sizeid">
                                        @foreach($sizes as $size)
                                            <option name="sizeid" value="{{$size->id}}">{{$size->height}}
                                                　mm　×　{{$size->width}} mm
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">Peas</th>
                            <th class="text-center">
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1" name="peasid">
                                        @foreach($peases as $peas)
                                            <option name="peasid" value="{{$peas->id}}">{{$peas->cnt}}　Peas</option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                        </tr>
                        </tbody>
                    </table>

                    @guest
                        <div class="alert alert-danger text-lg-center col-12">
                            <p>購入していただくには<a href="/register">新規登録</a>または<a href="/login">ログイン</a>して頂く必要があります。</p>
                        </div>
                    @else
                        @if(Auth::user()->rank <> 2)
                            <div class="alert alert-info text-lg-center col-12">
                                金額はピース数×1.75倍の金額になります。
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Cart Item Cnt　/　購入個数</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="itemcnt">
                                    <option name="itemcnt" value="1">1点</option>
                                    <option name="itemcnt" value="2">2点</option>
                                    <option name="itemcnt" value="3">3点</option>
                                    <option name="itemcnt" value="4">4点</option>
                                    <option name="itemcnt" value="5">5点</option>
                                </select>
                            </div>
                        <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                            <button type="submit" class="btn btn-primary btn-block">Purchase　/　購入</button>
                </form>
                @else
                    <div class="alert alert-danger text-lg-center col-12">
                        <p>現在アカウント停止中のため、購入できません。</p>
                    </div>
                @endif
                @endguest


            </div>
        </div>
    </div>

@endsection