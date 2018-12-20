@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-12 m-3">
            <h3 class="text-center">Al SpotComment</h3>
        </div>
        <div class="m-3">
            <h5>観光地に投稿されたコメントを確認・編集できます。</h5>
        </div>

        <table class="table table-borderless">
            <thead>
            <tr>
                <th class="text-center">UserId</th>
                <th class="text-center">SpotId</th>
                <th class="text-center">Comment</th>
                <th class="text-center">Rank</th>
                <th class="text-center">Create_date</th>
                <th class="text-center">Updater</th>
                <th class="text-center">Update_date</th>
                <th class="text-center">Etc</th>
                <th class="text-center">Button</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">#</th>
                <th class="text-center">Comment</th>
                <th class="text-center">Rank</th>
                <th class="text-center">作成者</th>
                <th class="text-center">0000-00-00</th>
                <th class="text-center">更新者</th>
                <th class="text-center">0000-00-00</th>
                <th class="text-center">memo</th>
                <th class="text-center">Edit or Add</th>
            </tr>
            </tbody>
        </table>

    </div>
@endsection