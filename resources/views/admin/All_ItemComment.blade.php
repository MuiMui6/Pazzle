@extends('layouts.adminapp')

@section('content')
    <div class="row">

        <div class="col-12 m-3">
            <h3 class="text-center">All Item Comment</h3>
        </div>
        <div class="col-12 text-center m-3">
            <h5>商品に投稿されたコメントをを確認・編集できます。</h5>
        </div>

        <div class="col-lg-12 m-3">
            <form action="/admin/All_ItemComment/Search" method="get">
                <div class="input-group">
                    <input type="text" class="form-control"
                           placeholder="Item Comment Id/ Item Id / Item Name / User Id / User Name / Updater Id / View" name="keyword">
                    <div class="input-group-append">
                        <button type="button"
                                class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item" value="item_comments.itemcommentid" name="searchclumn">Item Comment Id
                            </button>
                            <button class="dropdown-item" value="item_comments.itemid" name="searchclumn">Item Id
                            </button>
                            <button class="dropdown-item" value="items.name" name="searchclumn">Item Name</button>
                            <button class="dropdown-item" value="item_comments.userid" name="searchclumn">User Id
                            </button>
                            <button class="dropdown-item" value="users.name" name="searchclumn">User Name</button>
                            <button class="dropdown-item" value="item_comments.updaterid" name="searchclumn">Updater Id
                            </button>
                            <button class="dropdown-item" value="item_comments.view" name="searchclumn">View</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{--期限まで--}}
        <div class="col-lg-12 m-3">
            <form action="/admin/All_ItemComment/Date" method="get">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <th class="text-center">
                            <input type="date" class="form-control col" name="startday">
                        </th>
                        <th class="text-center">
                            <label class="text-center col">～</label>
                        </th>
                        <th class="text-center">
                            <input type="date" class="form-control col" name="endday">
                        </th>
                        <th class="text-center">

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown button
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="item_comments.created_at" name="dateclumn"
                                            type="submit">Created
                                    </button>
                                    <button class="dropdown-item" value="item_comments.updated_at" name="dateclumn"
                                            type="submit">Updated
                                    </button>
                                </div>
                            </div>
                        </th>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>


    <div class="justify-content-center m-3">
        {!! $ItemComments->appends(Request::query())->links() !!}
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th class="text-center">UserId</th>
            <th class="text-center">ItemId</th>
            <th class="text-center">Comment</th>
            <th class="text-center">Evaluation</th>
            <th class="text-center">View</th>
            <th class="text-center">Create_Date</th>
            <th class="text-center">Updated_Date</th>
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
                        <input type="hidden" value="{{$ItemComment->itemcommentid}}" name="itemcommentid">
                        <input type="hidden" value="{{$ItemComment->view}}" name="view">
                        <input type="hidden" value="{{$h_clumn}}" name="h_clumn">
                        <input type="hidden" value="{{$h_keyword}}" name="h_keyword">
                        <input type="hidden" value="{{$h_dateclumn}}" name="h_dateclumn">
                        <input type="hidden" value="{{$h_startday}}" name="h_startday">
                        <input type="hidden" value="{{$h_endday}}" name="h_endday">
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
@endsection