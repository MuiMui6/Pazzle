@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">


                <div class="col-12 m-3">
                    <h3 class="text-center">All Address</h3>
                </div>
                <div class="col-lg-12 m-3">
                    <h5>住所に関する情報を作成・編集できます。</h5>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/Register_Address" method="get">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            New Address
                        </button>
                    </form>
                </div>

                <div class="col-lg-12 m-3">

                    <div class="d-flex border-bottom border-dark">
                        <div class="col text-center"><h4>Post</h4></div>
                        <div class="col text-center"><h4>Add1</h4></div>
                        <div class="col text-center"><h4>Add2</h4></div>
                        <div class="col text-center"><h4>ToName</h4></div>
                        <div class="col text-center"><h4>EDIT</h4></div>
                    </div>

                    @foreach($addresses as $address)

                        <form action="/Edit_Address" method="get">
                            @csrf
                            <div class=" border-bottom">
                                <div class="d-flex bd-highlight m-3">
                                    <div class="col text-center">
                                        〒{{substr($address->post,0,3)}}-{{substr($address->post,4,7)}}
                                    </div>
                                    <div class="col text-center">
                                        {{$address->add1}}
                                    </div>
                                    <div class="col text-center">
                                        {{$address->add2}}
                                    </div>
                                    <div class="col text-center">
                                        {{$address->toname}}
                                    </div>
                                    <div class="col text-center">
                                        <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                        <input type="hidden" value="{{$address->id}}" name="id">
                                        <button type="submit" class="btn btn-primary">
                                            EDIT
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    @endforeach

                </div>


                <div class="col-lg-12 m-3">
                    {!! $addresses->appends(Request::query())->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection