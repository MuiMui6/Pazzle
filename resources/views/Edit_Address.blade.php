@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 m-3">
                <h3 class="text-center">Edit Address</h3>
            </div>
            <div class="m-3">
                <h5>住所の編集が出来ます。</h5>
            </div>
            <table class="table table-borderless">
                <tbody>
                {{--宛先名--}}
                <tr>
                    <th scope="row">ToName</th>
                    <td><input type="text" class="form-text"></td>
                </tr>

                {{--郵便番号--}}
                <tr>
                    <th scope="row">Post</th>
                    <td>
                        〒<input type="text" class="form-text">
                    </td>
                </tr>

                {{--アドレス１--}}
                <tr>
                    <th scope="row">Address1</th>
                    <td>
                        <input type="text" class="form-text">
                    </td>
                </tr>

                {{--アドレス２--}}
                <tr>
                    <th scope="row">Address2</th>
                    <td>
                        <input type="text" class="form-text">
                    </td>
                </tr>

                {{--メモ--}}
                <tr>
                    <th scope="row">Memo</th>
                    <td>
                                <textarea cols="50" rows="5" class="form-text">
                                </textarea>
                    </td>
                </tr>

                {{--保存--}}
                <tr>
                    <th scope="row"></th>
                    <td><input type="submit" class="btn btn-info" value="保存"></td>
                </tr>


                </tbody>
            </table>

        </div>
    </div>
@endsection