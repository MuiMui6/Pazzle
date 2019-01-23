@extends('layouts.notapp')

@section('content')
    <div class="row">

        <div class="col-12 m-3">
            <h3 class="text-center">Edit Spot Comment</h3>
        </div>
        <div class="m-3">
            <h5>観光地に寄せられたコメントに関する情報を編集できます。</h5>
        </div>

        <table class="table table-borderless">
            <tbody>
            <tr>
                <th class="text-center">ItemId</th>
                <th class="text-center">※変更できません</th>
            </tr>

            <tr>
                <th class="text-center">UserId</th>
                <th class="text-center">※変更できません</th>
            </tr>

            <tr>
                <th class="text-center">Evakuation</th>
                <th class="text-center"></th>
            </tr>

            <tr>
                <th class="text-center">Comment</th>
                <th class="text-center">
                        <textarea rows="5" cols="50" class="form-control">
                        </textarea>
                </th>
            </tr>

            <tr>
                <th class="text-center">View</th>
                <th class="text-center">
                    <input type="radio"><span class="m-3 mr-5">View</span>
                    <input type="radio"><span class="m-3">Not View</span>
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
            <input type="submit" class="btn btn-block" value="保存">
        </div>

    </div>
@endsection