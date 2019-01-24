@extends('layouts.notapp')


@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">
                <div class="col-12 m-3">
                    <h3 class="text-center">Register Topost</h3>
                </div>
                <div class="m-3">
                    <h5>商品の発送先を決定します。</h5>
                </div>


                <div class="col-12">
                    <form action="/New_Address">
                        @csrf
                        <input type="submit" class="btn btn-block" value="住所を追加する">
                    </form>
                </div>


                <div class="col-12">
                    <form action="/Register_Cart" method="post">
                        @csrf
                        <table class="table table-borderless">
                            <tbody>
                            @foreach($address as $addindex => $addresses)
                                <tr>
                                    <th class="text-center"><input type="radio" value="{{$addresses->id}}"
                                                                   name="addressid">
                                    </th>
                                    <th class="text-center">
                                        <p><h5>{{$addresses->toname}}</h5></p>
                                        <p>〒{{substr($addresses->post,0,3)}} - {{substr($addresses->post,4,7)}}</p>
                                        <p>{{$addresses->add1}}　{{$addresses->add2}}</p>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                        <input type="submit" class="btn btn-block" value="購入確認">

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection