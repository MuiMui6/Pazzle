@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <<div class="col-12 m-3">
                <h3 class="text-center">Edit Spot</h3>
            </div>
            <div class="m-3">
                <h5>商品に投稿されたコメントをを確認・編集できます。</h5>
            </div>


            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th class="text-center">UserId</th>
                        <th class="text-center">ItemId</th>
                        <th class="text-center">Comment</th>
                        <th class="text-center">Rank</th>
                        <th class="text-center">Create_date</th>
                        <th class="text-center">View</th>
                        <th class="text-center">Etc</th>
                        <th class="text-center">Edit</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <th class="text-center">投稿者</th>
                    <th class="text-center">商品名</th>
                    <th class="text-center">コメント</th>
                    <th class="text-center">3.0</th>
                    <th class="text-center">0000-00-00</th>
                    <th class="text-center">True or False</th>
                    <th class="text-center">memo</th>
                    <th class="text-center">Edit</th>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection