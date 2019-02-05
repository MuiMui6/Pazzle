@extends('layouts.notapp')

@section('content')

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All Size</h3>
                    <p class="text-center">サイズ一覧</p>
                </div>
                <div class="m-3">
                    <h5>I can manage the information about the size.</h5>
                    <p>サイズに関する情報を管理できます。</p>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/admin/All_Size/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search Clumn　/　検索項目
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Size Id　/　サイズID</button>
                                    <button class="dropdown-item" value="height" name="clumn">Height　/　縦幅</button>
                                    <button class="dropdown-item" value="width" name="clumn">Width　/　横幅</button>
                                    <button class="dropdown-item" value="name" name="clumn">Creater Name　/　製作者名</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-lg-12 m-3">

                    <div class="col-lg-12 m-3">
                        {!! $sizes->appends(Request::query())->links() !!}
                    </div>

                    <p>
                    <h3>Size List</h3></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">
                                <h5>Size ID</h5>
                                <p>サイズID</p>
                            </th>
                            <th class="text-center">
                                <h5>Height（mm）</h5>
                                <p>縦幅（mm）</p>
                            </th>
                            <th class="text-center">
                                <h5>Width（mm）</h5>
                                <p>横幅（mm）</p>
                            </th>
                            <th class="text-center">
                                <h5>Creater Name</h5>
                                <p>制作者名</p>
                            </th>
                            <th class="text-center">
                                <h5>Created Date</h5>
                                <p>作成日</p>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sizes as $size)
                            <tr>
                                <th class="text-center">{{$size->id}}</th>
                                <th class="text-center">{{$size->height}}</th>
                                <th class="text-center">{{$size->width}}</th>
                                <th class="text-center">{{$size->creatername}}</th>
                                <th class="text-center">{{$size->created_at->format('Y年m月d日')}}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <p>
                    <h3>New Size</h3></p>
                    <form action="/admin/All_Size/Create" method="post">
                        @csrf
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th class="text-center"><input type="text" name="height" class="form-control"
                                                               placeholder="height"></th>
                                <th class="text-center"><input type="text" name="width" class="form-control"
                                                               placeholder="width"></th>
                                <th class="text-center">{{Auth::user()->name}}</th>
                                <th class="text-center">{{now()->format('Y年m月d日')}}</th>
                                <th class="text-center">
                                    <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                    <button type="submit" class="btn btn-primary">CREATE</button>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection