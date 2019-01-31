@extends('layouts.notapp')

@section('content')

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All User</h3>
                </div>
                <div class="m-3">
                    <h5>ユーザに関する情報を確認・編集できます。</h5>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/admin/All_User/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search Clumn
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">User Id</button>
                                    <button class="dropdown-item" value="name" name="clumn">User Name</button>
                                    <button class="dropdown-item" value="email" name="clumn">Email</button>
                                    <button class="dropdown-item" value="rank" name="clumn">Rank</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-lg-12 m-3">
                    {!! $users->appends(Request::query())->links() !!}
                </div>

                <div class="col-lg-12 m-3">
                    <table class="table table-striped">
                        <thead>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Rank</th>
                        <th class="text-center">CreateDate</th>
                        <th class="text-center">UpdateDate</th>
                        <th class="text-center">EDIT</th>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th class="text-center">{{$user->name}}</th>
                                <th class="text-center">{{$user->email}}</th>
                                <th class="text-center">
                                    @switch($user->rank)
                                        @case('1')
                                        管理者
                                        @break
                                        @case('2')
                                        一時停止
                                        @break
                                        @default
                                        一般ユーザ
                                    @endswitch
                                </th>
                                <th class="text-center">{{$user->created_at->format('Y年m月d日')}}</th>
                                <th class="text-center">{{$user->updated_at->format('Y年m月d日')}}</th>
                                <th class="text-center">
                                    <form action="/admin/Edit_User/Detail" method="get">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                                        <button class="btn btn-primary">
                                            EDIT
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection