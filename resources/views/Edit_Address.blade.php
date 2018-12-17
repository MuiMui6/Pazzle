@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Address Edit</h5>
                    <p class="card-text">
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
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection