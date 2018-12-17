@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card mb-3">
                <img class="card-img-top" src="img/spring.JPG" height="400px">
                <div class="card-body">
                    <h5 class="card-title">鶴見緑地公園</h5>
                    <p class="card-text">
                    <table class="table table-borderless">
                        <tbody>
                        {{--紹介文--}}
                        <tr>
                            <th scope="row">Profile</th>
                            <td>
                                <p>大阪府大阪市鶴見区にあります。鶴見緑地公園です。</p>
                                <p>いきいき地球館や花博、広い広場もあり、イベントが豊富です。</p>
                            </td>
                        </tr>

                        {{--Tel--}}
                        <tr>
                            <th scope="row">Tel</th>
                            <td>000-0000-0000</td>
                        </tr>


                        {{--Website--}}
                        <tr>
                            <th scope="row">Website</th>
                            <td><a href="#">WebsiteURL</a></td>
                        </tr>

                        {{--観光地--}}
                        <tr>
                            <th scope="row">Spot</th>
                            <td>大阪府大阪市鶴見区</td>
                        </tr>
                        </tbody>
                    </table>
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection