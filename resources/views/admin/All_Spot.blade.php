@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-12 m-3">
            <h3 class="text-center">Edit Spot</h3>
        </div>
        <div class="m-3">
            <h5>観光地に関する情報を作成・編集できます。</h5>
        </div>

        <table class="table table-borderless">
            <thead>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Name</th>
                <th class="text-center">Profile</th>
                <th class="text-center">URL</th>
                <th class="text-center">Address</th>
                <th class="text-center">Creater</th>
                <th class="text-center">Create_date</th>
                <th class="text-center">Updater</th>
                <th class="text-center">Update_date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">profile</th>
                <th class="text-center">Url</th>
                <th class="text-center">Address</th>
                <th class="text-center">作成者</th>
                <th class="text-center">0000-00-00</th>
                <th class="text-center">更新者</th>
                <th class="text-center">0000-00-00</th>
            </tr>
            </tbody>
        </table>

    </div>
@endsection