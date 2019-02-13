@extends('layouts.notapp')

@section('content')

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3 text-center">
                    <h3>Edit　Address</h3>
                    <p>住所編集</p>
                </div>
                <div class="col-12 m-3">
                    <h5></h5>
                    <p>該当住所データを編集できます。</p>
                </div>

                <img src="img/s_line.png">

                <form action="/Edit_Address" method="post">
                    @csrf
                    @foreach($addresses as $address)
                        <table class="table table-borderless">
                            <tbody>
                            {{--宛先名--}}
                            <tr>
                                <th scope="row">ToName</th>
                                <td><input type="text" class="form-control" placeholder="{{$address->toname}}"
                                           name="toname"></td>
                            </tr>

                            {{--郵便番号--}}
                            <tr>
                                <th scope="row">Post</th>
                                <td class="form-inline">
                                    〒　<input type="text" class="form-control" placeholder="{{$address->post}}"
                                             name="post">
                                </td>
                            </tr>

                            {{--アドレス１--}}
                            <tr>
                                <th scope="row">Address1</th>
                                <td>
                                    <input type="text" class="form-control" placeholder="{{$address->add1}}"
                                           name="add1">
                                </td>
                            </tr>

                            {{--アドレス２--}}
                            <tr>
                                <th scope="row">Address2</th>
                                <td>
                                    <input type="text" class="form-control" placeholder="{{$address->add2}}"
                                           name="add2">
                                </td>
                            </tr>

                            {{--保存--}}
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <input type="hidden" value="{{$address->id}}" name="id">
                                    <input type="hidden" value="{{$authsec}}" name="authsec">
                                    <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                    <button type="submit" class="btn btn-info">保存</button>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection