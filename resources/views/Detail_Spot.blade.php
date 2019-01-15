@if(Auth::user()->rank == 1)
    @extends('layouts.adminapp')
@else
    @extends('layouts.notapp')
@endif

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

            {{--Address--}}
            <tr>
                <th scope="row">Address</th>
                <td>大阪府大阪市鶴見区</td>
            </tr>

            {{--TEL--}}
            <tr>
                <th scope="row">Tel</th>
                <td>000-0000-0000</td>
            </tr>
            </tbody>
        </table>

        <div class="col-12 m-3">
            <h3 class="text-center">Comment</h3>
        </div>

        @guest
            <div class="alert alert-info text-lg-center col-12">
                コメントするには<a href="/register">新規登録</a>または<a href="/login">ログイン</a>していただく必要があります。
            </div>
        @endguest

        <table class="table table-borderless">
            <thead>
            <tr>
                <td><h3>Average Evaluation</h3></td>
                <td><h3>3.0</h3></td>
            </tr>
            <tr>
                <td>Evaluation</td>
                <td>Name</td>
                <td>Comment</td>
            </tr>
            <tr>

                @guest
                @else
                    <form action="/Detail_SpotComment" method="post">
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    評価を選んでください
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button" value="1" name="evaluation">★
                                    </button>
                                    <button class="dropdown-item" type="button" value="2" name="evaluation">★★
                                    </button>
                                    <button class="dropdown-item" type="button" value="3" name="evaluation">★★★
                                    </button>
                                    <button class="dropdown-item" type="button" value="4" name="evaluation">★★★★
                                    </button>
                                    <button class="dropdown-item" type="button" value="5" name="evaluation">★★★★★
                                    </button>
                                </div>
                            </div>

                        </td>
                        <td>
                            {{Auth::user()->name}}</td>
                        <td><textarea cols="50" rows="5" class="form-control"></textarea></td>
                        <td>
                            <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                            <input type="submit" value="投稿" class="btn btn-info">
                        </td>
                    </form>
                @endguest
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-left">3.0</td>
                <td class="text-left">投稿者</td>
                <td class="text-left">コメント文コメント文コメント文</td>
            </tr>
            </tbody>
        </table>
        @endforeach
    </div>
@endsection