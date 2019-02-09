@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All SpotComment</h3>
                    <p class="text-center">観光地コメント一覧</p>
                </div>
                <div class="m-3">
                    <h5>I can manage the comment contributed to a sightseeing spot article.</h5>
                    <p>観光地記事に投稿されたコメントを管理することが出来ます。</p>
                </div>
                @if($message <> null)
                    <div class="alert alert-info m-3">
                        {{$message}}
                    </div>
                @endif
                <div class="col-lg-12 m-3">
                    <form action="/admin/All_SpotComment/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search
                                    Clumn　/　検索項目
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Comment ID　/　コメントID</button>
                                    <button class="dropdown-item" value="username" name="clumn">User Name　/　ユーザ名
                                    </button>
                                    <button class="dropdown-item" value="spotname" name="clumn">Spot Name　/　観光地名
                                    </button>
                                    <button class="dropdown-item" value="comment" name="clumn">Comment　/　コメント</button>
                                    <button class="dropdown-item" value="evaluation" name="clumn">Evaluation　/　評価
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-12 m-3">
                    {!! $spotcomments->appends(Request::query())->links() !!}
                </div>

                <div class="col-lg-12 m-3">

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
                                <h5>Spot Name</h5>
                                <p>観光地名</p>
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
                                <p>投稿日</p>
                            </th>
                            <th class="text-center">
                                <h5>Updated Date</h5>
                                <p>更新日</p>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($spotcomments as $spotcomment)
                            <tr>
                                <th class="text-center">{{$spotcomment->id}}</th>
                                <th class="text-center">{{$spotcomment->name}}</th>
                                <th class="text-center">{{$spotcomment->spotname}}</th>
                                <th class="text-center">{{$spotcomment->comment}}</th>
                                <th class="text-center">{{$spotcomment->evaluation}}</th>
                                <th class="text-center">
                                    <form action="/admin/All_SpotComment/ViewEdit" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$spotcomment->id}}" name="id">
                                        <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                        <input type="hidden" value="{{$spotcomment->view}}" name="view">
                                        @if($spotcomment->view == 1)
                                            <button class="btn btn-success" type="submit">
                                                True
                                            </button>
                                        @elseif($spotcomment->view == 0)
                                            <button class="btn btn-danger" type="submit">
                                                False
                                            </button>
                                        @endif
                                    </form>
                                </th>
                                <th class="text-center">{{$spotcomment->created_at->format('Y年m月d日')}}</th>
                                <th class="text-center">{{$spotcomment->updated_at->format('Y年m月d日')}}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection