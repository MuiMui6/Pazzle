@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12 text-center">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">Edit User</h3>
                </div>
                <div class="m-3">
                    <h5>ユーザ様の情報の確認・編集が出来ます。</h5>
                </div>

                <div class="col-12 m-3 text-center">
                    <h3>Edit User</h3>
                    <p>ユーザ編集</p>
                </div>
                <div class="col-12 m-3">
                    <h5>{{Auth::user()->name}}</h5>
                    <p>{{Auth::user()->name}}様の情報を編集できます。</p>
                </div>

                <img src="img/s_line.png">


                <form action="/Edit_User" method="post">
                    @csrf
                    <table class="table table-borderless">
                        @foreach($users as $user)
                            <tbody>
                            {{--ユーザ名--}}
                            <tr>
                                <th scope="row">Name</th>
                                <td>
                                    <input type="text" class="form-control" placeholder="{{$user->name}}" name="name">
                                </td>
                            </tr>

                            {{--メール--}}
                            <tr>
                                <th scope="row">Email</th>
                                <td>
                                    <input type="email" class="form-control" placeholder="{{$user->email}}">
                                </td>
                            </tr>

                            {{--パスワード--}}
                            <tr>
                                <th scope="row">Password</th>
                                <td>
                                    <input type="password" class="mb-3 form-control" name="pass1">
                                    <input type="password" class="mt-3 form-control" name="pass2">
                                </td>
                            </tr>

                            {{--Secretkey--}}
                            <tr>
                                <th scope="row">Secret Key</th>
                                <td>
                                    <input type="password" class="form-control" placeholder="Secret Key" name="secretkey">
                                </td>
                            </tr>


                            {{--保存--}}
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <button type="submit" value="{{Auth::user()->id}}" name="userid"
                                            class="btn btn-primary">
                                        Save
                                    </button>
                                </td>
                            </tr>

                            </tbody>
                        @endforeach
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection