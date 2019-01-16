@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="col-12 m-3">
            <h3 class="text-center">Edit User</h3>
        </div>
        <div class="m-3">
            <h5>ユーザ様の情報の確認・編集が出来ます。</h5>
        </div>
        <p class="card-text">
        <table class="table table-borderless">
            <tbody>
            {{--ユーザ名--}}
            <tr>
                <th scope="row">Name</th>
                <td>
                    <input type="text" class="form-control">
                </td>
            </tr>

            {{--メール--}}
            <tr>
                <th scope="row">Email</th>
                <td>
                    <input type="email" class="form-control">
                </td>
            </tr>

            {{--パスワード--}}
            <tr>
                <th scope="row">Password</th>
                <td>
                    <input type="text" class="m-3 form-control">
                    <input type="text" class="m-3 form-control">
                </td>
            </tr>

            {{--保存--}}
            <tr>
                <th scope="row"></th>
                <td>
                    <form action="/Edit_User">
                        @csrf
                        <input type="submit" class="btn btn-info" value="保存">
                    </form>
                </td>
            </tr>

            </tbody>
        </table>
        </p>

        <table class="table table-borderless">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">ToName</th>
                <th class="text-center">Post</th>
                <th class="text-left">Add1</th>
                <th class="text-left">Add2</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>1</th>
                <th>宛先名</th>
                <th>〒0000000</th>
                <th>大阪府大阪市</th>
                <th>OIC</th>
                <th><input type="submit" class="btn btn-info" value="Edit"></th>
                <th><input type="submit" class="btn btn-danger" value="Edit"></th>
            </tr>
            </tbody>
        </table>

    </div>
@endsection