@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All Item Comment</h3>
                </div>
                <div class="col-12 text-center m-3">
                    <h5>商品に投稿されたコメントをを確認・可視/不可視変更できます。</h5>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/admin/All_ItemComment/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search Clumn
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Item Comment Id</button>
                                    <button class="dropdown-item" value="itemid" name="clumn">Item Id</button>
                                    <button class="dropdown-item" value="itemname" name="clumn">Item Name</button>
                                    <button class="dropdown-item" value="userid" name="clumn">User Id</button>
                                    <button class="dropdown-item" value="username" name="clumn">User Name</button>
                                    <button class="dropdown-item" value="evaluation" name="clumn">Evaluation</button>
                                    <button class="dropdown-item" value="comment" name="clumn">Comment</button>
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
                        <th class="text-center">User Name</th>
                        <th class="text-center">Item Name</th>
                        <th class="text-center">Comment</th>
                        <th class="text-center">Evaluation</th>
                        <th class="text-center">View</th>
                        <th class="text-center">Created Date</th>
                        <th class="text-center">Updated Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ItemComments as $ItemComment)
                        <tr>
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