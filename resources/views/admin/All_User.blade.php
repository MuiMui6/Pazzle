@extends('layouts.notapp')

@section('content')

    <div class="row">
        <div class="col-12 m-3">
            <h3 class="text-center">All User</h3>
        </div>
        <div class="m-3">
            <h5>全ユーザの情報を確認できます。</h5>
        </div>

        <table class="table table-borderless">
            <thead>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Email_Verified_Date</th>
                <th class="text-center">Create_date</th>
                <th class="text-center">Updater</th>
                <th class="text-center">Update_date</th>
                <th class="text-center">Etc</th>
                <th class="text-center">Edit</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">名前</th>
                <th class="text-center">AAA@MAIL.MAIL</th>
                <th class="text-center">0000-00-00</th>
                <th class="text-center">0000-00-00</th>
                <th class="text-center">更新者</th>
                <th class="text-center">0000-00-00</th>
                <th class="text-center">メモ</th>
                <th class="text-center">Edit</th>
            </tr>
            </tbody>
        </table>

    </div>
@endsection