@extends('layouts.adminapp')

@section('content')
    <div class="row">

        <div class="col-12 m-3">
            <h3 class="text-center">Edit Spot</h3>
        </div>
        <div class="m-3">
            <h5>観光地に関する情報を作成・編集できます。</h5>
        </div>


        <table class="table table-borderless">
            <tbody>
            <tr>
                <th class="text-center">SpotName</th>
                <th class="text-left"><input type="text" class="form-control"></th>
            </tr>
            <tr>
                <th class="text-center">Profile</th>
                <th class="text-left"><textarea rows="5" cols="50" class="form-control"></textarea></th>
            </tr>
            <tr>
                <th class="text-center">WebSite</th>
                <th class="text-left"><input type="text" class="form-control"></th>
            </tr>
            <tr>
                <th class="text-center">Address</th>
                <th class="text-left"><input type="text" class="form-control"></th>
            </tr>
            <tr>
                <th class="text-center">Image</th>
                <th class="text-left"><input type="file"></th>
            </tr>
            </tbody>
        </table>

        <div class="col-12 text-center m-3">
            <input type="" class="btn btn-info" value="保存">
        </div>

    </div>
@endsection