@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All Item Comment</h3>
                    <p class="text-center">商品コメント一覧</p>
                </div>
                <div class="col-12 m-3">
                    <h5>I can manage the information about the sightseeing Item Comment.</h5>
                    <p>商品コメントに関する情報を管理することが出来ます。</p>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/admin/All_ItemComment/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search Clumn　/　検索項目
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Comment Id　/　コメントID</button>
                                    <button class="dropdown-item" value="itemid" name="clumn">Item Id　/　商品ID</button>
                                    <button class="dropdown-item" value="itemname" name="clumn">Item Name　/　商品名</button>
                                    <button class="dropdown-item" value="userid" name="clumn">User Id　/　ユーザID</button>
                                    <button class="dropdown-item" value="username" name="clumn">User Name　/　ユーザ名</button>
                                    <button class="dropdown-item" value="evaluation" name="clumn">Evaluation　/　評価</button>
                                    <button class="dropdown-item" value="comment" name="clumn">Comment　/　コメント</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="justify-content-center m-3">
                    {!! $ItemComments->appends(Request::query())->links() !!}
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">
                            <h5>Comment ID</h5>
                            <p>コメントID</p>
                        </th>
                        <th class="text-center">
                            <h5>User Name</h5>
                            <p>ユーザ名</p>
                        </th>
                        <th class="text-center">
                            <h5>Item Name</h5>
                            <p>商品名</p>
                        </th>
                        <th class="text-center">
                            <h5>Comment</h5>
                            <p>コメント</p>
                        </th>
                        <th class="text-center">
                            <h5>Evaluation</h5>
                            <p>評価</p>
                        </th>
                        <th class="text-center">
                            <h5>View</h5>
                            <p>可視/不可視</p>
                        </th>
                        <th class="text-center">
                            <h5>Created Date</h5>
                            <p>作成日</p>
                        </th>
                        <th class="text-center">
                            <h5>Updated Date</h5>
                            <p>更新日</p>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ItemComments as $ItemComment)
                        <tr>
                            <th class="text-center">{{$ItemComment->id}}</th>
                            <th class="text-center">{{$ItemComment->username}}</th>
                            <th class="text-center">{{$ItemComment->itemname}}</th>
                            <th class="text-center">{{$ItemComment->comment}}</th>
                            <th class="text-center">{{$ItemComment->evaluation}}</th>
                            <th class="text-center">
                                <form action="/admin/All_ItemComment/ViewEdit" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$ItemComment->id}}" name="itemcommentid">
                                    <input type="hidden" value="{{$ItemComment->view}}" name="view">
                                    @if($ItemComment->view == 1)
                                        <button class="btn btn-primary" type="submit">
                                            True
                                        </button>
                                    @elseif($ItemComment->view == 0)
                                        <button class="btn btn-danger" type="submit">
                                            False
                                        </button>
                                    @endif
                                </form>
                            </th>
                            <th class="text-center">{{$ItemComment->created_at->format('Y年m月d日')}}</th>
                            <th class="text-center">{{$ItemComment->updated_at->format('Y年m月d日')}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection