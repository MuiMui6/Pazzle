@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-12 m-3">
            <h3 class="text-center">Edit User</h3>
        </div>
        <div class="m-3">
            <h5>ユーザに関する情報を編集できます。</h5>
        </div>


        <table class="table table-borderless">
            <tbody>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">
                    <input type="text" class="form-control">
                </th>
            </tr>
            <tr>
                <th class="text-center">Email</th>
                <th class="text-center">
                    <input type="email" class="form-control">
                </th>
            </tr>
            <tr>
                <th class="text-center">Rank</th>
                <th class="text-center">
                    <input type="radio"><span class="m-3 mr-5">Admin</span>
                    <input type="radio"><span class="m-3">User</span>
                </th>
            </tr>
            <tr>
                <th class="text-center">Etc</th>
                <th class="text-center">
                    <textarea rows="5" cols="50" class="form-control"></textarea>
                </th>
            </tr>
            </tbody>
        </table>

        <input type="submit" value="保存" class="btn btn-block">

    </div>
@endsection