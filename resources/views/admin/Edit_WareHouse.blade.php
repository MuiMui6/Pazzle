@extends('layouts.adminapp')

@section('content')
    <div class="row">

        <div class="col-12 m-3">
            <h3 class="text-center">Edit Warehouse</h3>
        </div>
        <div class="m-3">
            <h5>入庫情報を編集できます。</h5>
        </div>

        <table class="table table-borderless">
            <tbody>
            <tr>
                <th class="text-center">ItemId</th>
                <th class="text-center">
                    <input type="text" class="form-control">
                </th>
            </tr>

            <tr>
                <th class="text-center">Cnt</th>
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