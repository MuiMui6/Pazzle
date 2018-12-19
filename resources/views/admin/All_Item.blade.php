@extends('layouts.app')

@section('content')
    <div class="row">

        <
        <div class="col-12 m-3">
            <h3 class="text-center">All Item</h3>
        </div>
        <div class="m-3">
            <h5>商品の確認・編集ができます。</h5>
        </div>

        <table class="table table-borderless">
            <thead>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Image</th>
                <th class="text-center">Name</th>
                <th class="text-center">Profile</th>
                <th class="text-center">Tag</th>
                <th class="text-center">Size</th>
                <th class="text-center">Peas</th>
                <th class="text-center">SpotId</th>
                <th class="text-center">View</th>
                <th class="text-center">Creater</th>
                <th class="text-center">Create_date</th>
                <th class="text-center">Updater</th>
                <th class="text-center">Update_date</th>
                <th class="text-center">etc</th>
                <th class="text-center">Button</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">image</th>
                <th class="text-center">Name</th>
                <th class="text-center">Profile</th>
                <th class="text-center">Tag</th>
                <th class="text-center">Size×Size(mm)</th>
                <th class="text-center">(Peas)</th>
                <th class="text-center">spotid</th>
                <th class="text-center">true or false</th>
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