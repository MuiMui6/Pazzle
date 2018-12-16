@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @for($i = 0;$i<=15;$i++)
            <div class="card m-3" style="width: 18rem;">
                <img class="card-img-top" src="img/spring.JPG" width="180px">
                <div class="card-body">
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

                        {{--詳細--}}
                        <tr>
                            <th scope="row"></th>
                            <td><input type="submit" class="btn btn-info" value="Detail"></td>
                        </tr>
                        </tbody>
                    </table>
                    </p>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
