@extends('layouts.app')

@section('content')
    <div class="row">

        <img class="card-img-top" src="img/spring.JPG" height="400px">
        <div class="col-12 m-3">
            <h3 class="text-center">鶴見緑地公園</h3>
        </div>
        <div class="m-3">
            <h5>鶴見緑地公園に関する情報を確認できます。</h5>
        </div>
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

            {{--Website--}}
            <tr>
                <th scope="row">WebSite</th>
                <td><a href="#">WebsiteURL</a></td>
            </tr>

            {{--観光地--}}
            <tr>
                <th scope="row">Address</th>
                <td>大阪府大阪市鶴見区</td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection