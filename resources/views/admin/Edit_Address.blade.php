@extends('layouts.notapp')

@section('content')
    <div class="row">

        <div class="col-12 m-3">
            <h3 class="text-center">Edit Address</h3>
        </div>
        <div class="m-3">
            <h5>観光地に関する情報を作成・編集できます。</h5>
        </div>


        <table class="table table-borderless">
            <tbody>
            <tr>
                <th class="text-center">AddressId</th>
                <th class="text-center">
                    ※変更できません
                </th>
            </tr>
            <tr>
                <th class="text-center">UserId</th>
                <th class="text-center">
                    ※変更できません
                </th>
            </tr>
            <tr>
                <th class="text-center">ToName</th>
                <th class="text-center">
                    <input type="text" class="form-control">
                </th>
            </tr>
            <tr>
                <th class="text-center">Post</th>
                <th class="text-center form-inline">
                    〒　<input type="text" class="form-control">
                </th>
            </tr>
            <tr>
                <th class="text-center">Address1</th>
                <th class="text-center">
                    <input type="text" class="form-control">
                </th>
            </tr>
            <tr>
                <th class="text-center">Address2</th>
                <th class="text-center">
                    <input type="text" class="form-control">
                </th>
            </tr>
            <tr>
                <th class="text-center">Etc</th>
                <th class="text-center">
                    <textarea rows="5" cols="50" class="form-control">
                    </textarea>
                </th>
            </tr>
            </tbody>
        </table>

        <div class="col-12 m-3">
            <input type="submit" value="保存" class="btn btn-block">
        </div>

    </div>
@endsection