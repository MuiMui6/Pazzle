@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">Edit User</h3>
                    <p class="text-center">ユーザ編集</p>
                </div>
                <div class="m-3">
                    <h5>I can edit the information about the user.</h5>
                    <p>ユーザに関する情報を編集できます</p>
                </div>

                <form action="/admin/Edit_User/Detail" method="post">
                    @csrf
                    <table class="table table-borderless">
                        <tbody>
                        @foreach($users as $user)
                            <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <tr>
                                <th class="text-center">
                                    <h5>User ID</h5>
                                    <p>ユーザID</p>
                                </th>
                                <th class="text-center">
                                    {{$user->id}}
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    <h5>User Name</h5>
                                    <p>ユーザ名</p>
                                </th>
                                <th class="text-center">
                                    <input type="text" class="form-control" placeholder="{{$user->name}}" name="name">
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    <h5>E-Mail</h5>
                                    <p>Eメール</p>
                                </th>
                                <th class="text-center">
                                    <input type="email" class="form-control" placeholder="{{$user->email}}"
                                           name="email">
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    <h5>Rank</h5>
                                    <p>ランク</p>
                                </th>
                                <th class="text-center">
                                    @switch($user->rank)
                                        @case('0')
                                        <input type="radio" value="0" name="rank" checked><span
                                                class="m-3 mr-5">User</span>
                                        <input type="radio" value="1" name="rank"><span class="m-3 mr-5">Admin</span>
                                        <input type="radio" value="2" name="rank"><span class="m-3">Stop User</span>
                                        @break
                                        @case('1')
                                        <input type="radio" value="0" name="rank"><span class="m-3 mr-5">User</span>
                                        <input type="radio" value="1" name="rank" checked><span
                                                class="m-3 mr-5">Admin</span>
                                        <input type="radio" value="2" name="rank"><span class="m-3">Stop User</span>
                                        @break
                                        @default
                                        <input type="radio" value="0" name="rank"><span class="m-3 mr-5">User</span>
                                        <input type="radio" value="1" name="rank"><span class="m-3 mr-5">Admin</span>
                                        <input type="radio" value="2" name="rank" checked><span
                                                class="m-3">Stop User</span>
                                    @endswitch
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    <h5>Created Date</h5>
                                    <p>作成日</p>
                                </th>
                                <th class="text-center">
                                    {{$user->created_at->format('Y年m月d日')}}
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    <h5>Updated Date</h5>
                                    <p>更新日</p>
                                </th>
                                <th class="text-center">
                                    {{$user->updated_at->format('Y年m月d日')}}
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-block btn-primary">Save　/　保存</button>

                </form>

            </div>
        </div>
    </div>
@endsection