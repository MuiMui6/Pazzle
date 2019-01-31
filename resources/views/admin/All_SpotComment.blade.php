@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All SpotComment</h3>
                </div>
                <div class="m-3">
                    <h5>コメントに関する情報編集できます。</h5>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/admin/All_SpotComment/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Id</button>
                                    <button class="dropdown-item" value="" name="clumn"></button>
                                    <button class="dropdown-item" value="" name="clumn"></button>
                                    <button class="dropdown-item" value="" name="clumn"></button>
                                    <button class="dropdown-item" value="" name="clumn"></button>
                                    <button class="dropdown-item" value="" name="clumn"></button>
                                    <button class="dropdown-item" value="" name="clumn"></button>
                                    <button class="dropdown-item" value="" name="clumn"></button>
                                    <button class="dropdown-item" value="" name="clumn"></button>
                                    <button class="dropdown-item" value="" name="clumn"></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-lg-12 m-3">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">UserName</th>
                            <th class="text-center">SpotName</th>
                            <th class="text-center">Comment</th>
                            <th class="text-center">Evaluation</th>
                            <th class="text-center">View</th>
                            <th class="text-center">Create_Date</th>
                            <th class="text-center">Updated_Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($spotcomments as $spotcomment)
                            <tr>
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
                                            <button class="btn btn-primary" type="submit">
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

                <div class="col-lg-12 m-3">
                    {!! $spotcomments->appends(Request::query())->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection