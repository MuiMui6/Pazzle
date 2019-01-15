@extends('layouts.adminapp')

@section('content')
    <div class="row">

        <div class="col-12 m-3">
            <h3 class="text-center">All Address</h3>
        </div>
        <div class="m-3">
            <h5>登録されている情報を確認・編集できます。</h5>
        </div>

        <table class="table table-borderless">
            <thead>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">UserId</th>
                <th class="text-center">ToName</th>
                <th class="text-center">Post</th>
                <th class="text-center">Add1</th>
                <th class="text-center">Add2</th>
                <th class="text-center">Creater</th>
                <th class="text-center">Create_date</th>
                <th class="text-center">Updater</th>
                <th class="text-center">Update_date</th>
                <th class="text-center">Etc</th>
                <th class="text-center">Edit</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Name</th>
                <th class="text-center">ToName</th>
                <th class="text-center">000-0000</th>
                <th class="text-center">add1</th>
                <th class="text-center">add2</th>
                <th class="text-center">作成者</th>
                <th class="text-center">0000-00-00</th>
                <th class="text-center">更新者</th>
                <th class="text-center">0000-00-00</th>
                <th class="text-center">memo</th>
                <th class="text-center">Edit</th>
            </tr>
            </tbody>
        </table>

    </div>
@endsection