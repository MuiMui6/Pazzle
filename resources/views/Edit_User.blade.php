@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card mb-5">
                <div class="card-body">
                    <h5 class="card-title">User Edit</h5>
                    <p class="card-text">
                    <table class="table table-borderless">
                        <tbody>
                        {{--ユーザ名--}}
                        <tr>
                            <th scope="row">Name</th>
                            <td>
                                <input type="text" class="form-text">
                            </td>
                        </tr>

                        {{--メール--}}
                        <tr>
                            <th scope="row">Email</th>
                            <td>
                                <input type="email" class="form-text">
                            </td>
                        </tr>

                        {{--パスワード--}}
                        <tr>
                            <th scope="row">Password</th>
                            <td>
                                <input type="text" class="form-text">
                                <input type="text" class="form-text">
                            </td>
                        </tr>

                        {{--保存--}}
                        <tr>
                            <th scope="row"></th>
                            <td><input type="submit" class="btn btn-info" value="保存"></td>
                        </tr>

                        </tbody>
                    </table>
                    </p>

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">ToName</th>
                                <th class="text-center">Post</th>
                                <th class="text-left">Add1</th>
                                <th class="text-left">Add2</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <th>宛先名</th>
                                <th>〒0000000</th>
                                <th>大阪府大阪市</th>
                                <th>OIC</th>
                                <th><input type="submit" class="btn btn-info" value="Edit"></th>
                                <th><input type="submit" class="btn btn-danger" value="Edit"></th>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
@endsection