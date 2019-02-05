@extends('layouts.notapp')

@section('content')

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-lg-12 m-3">
                    <h3 class="text-center">All User</h3>
                    <p class="text-center">ユーザ一覧</p>
                </div>
                <div class="col-lg-12 m-3">
                    <h5>I come by confirmation, editing in the information about the user.</h5>
                    <p>ユーザに関する情報を確認・編集できます。</p>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/admin/All_User/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">検索項目
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">ユーザID</button>
                                    <button class="dropdown-item" value="name" name="clumn">ユーザ名</button>
                                    <button class="dropdown-item" value="email" name="clumn">Eメールアドレス</button>
                                    <button class="dropdown-item" value="rank" name="clumn">ランク</button>
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
                        <th class="text-center">
                            <h5>User ID</h5>
                            <p>ユーザID</p>
                        </th>
                        <th class="text-center">
                            <h5>User Name</h5>
                            <p>ユーザ名</p>
                        </th>
                        <th class="text-center">
                            <h5>E-Mail</h5>
                            <p>Eメール</p>
                        </th>
                        <th class="text-center">
                            <h5>Rank</h5>
                            <p>ランク</p>
                        </th>
                        <th class="text-center">
                            <h5>Created Date</h5>
                            <p>作成日</p>
                        </th>
                        <th class="text-center">
                            <h5>Updated Date</h5>
                            <p>更新日</p>
                        </th>
                        <th class="text-center">
                            <h5>Edit</h5>
                            <p>編集</p>
                        </th>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th class="text-center">{{$user->id}}</th>
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
                                            編集
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