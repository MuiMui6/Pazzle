@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card mb-3">
                <img class="card-img-top" src="img/spring.JPG" height="400px">
                <div class="card-body">
                    <h5 class="card-title">Title</h5>
                    <p class="card-text">
                    <table class="table table-borderless">
                        <tbody>
                        {{--商品名--}}
                        <tr>
                            <th scope="row">Name</th>
                            <td>春の桜</td>
                        </tr>

                        {{--紹介文--}}
                        <tr>
                            <th scope="row">Profile</th>
                            <td>鶴見緑地にて撮影した写真をパズルにしました！</td>
                        </tr>

                        {{--サイズ--}}
                        <tr>
                            <th scope="row">Size</th>
                            <td>縦×横（mm）</td>
                        </tr>

                        {{--ピース数--}}
                        <tr>
                            <th scope="row">PeasCnt</th>
                            <td>1000peas</td>
                        </tr>

                        {{--観光地--}}
                        <tr>
                            <th scope="row">Spot</th>
                            <td>大阪、鶴見</td>
                        </tr>

                        {{--購入--}}
                        <tr>
                            <th scope="row"></th>
                            <td><input type="submit" class="btn btn-info" value="カートに入れる"></td>
                        </tr>


                        </tbody>
                    </table>
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Tag1,Tag2,Tag3</small>
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection