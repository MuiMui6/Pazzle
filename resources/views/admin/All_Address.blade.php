@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All Address</h3>
                </div>
                <div class="col m-3">
                    <h5>住所に関する情報を作成・編集できます。</h5>
                </div>

                <div class="col m-3">
                    <form action="/admin/All_Address/Create" method="get">
                    <button type="submit" class="btn btn-danger">New Address</button>
                    </form>
                </div>

                <div class="col-lg-12 m-3 mb-4">
                    <form action="/admin/All_Address" method="get">
                        <div class="input-group mr-3">
                            <input type="text" class="form-control"
                                   placeholder=" post / add1 / add2 / ToName / Creater Name "
                                   aria-describedby="button-addon2" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-12 m-3">

                    <div class="d-flex border-bottom border-dark">
                        <div class="col text-center"><h3>　Post</h3></div>
                        <div class="col text-center"><h3>　Add1</h3></div>
                        <div class="col text-center"><h3>　Add2</h3></div>
                        <div class="col text-center"><h3>ToName</h3></div>
                        <div class="col text-center"><h3>Creater</h3></div>
                        <div class="col text-center"><h3>UpdateDate</h3></div>
                        <div class="col text-center"><h3>Button</h3></div>
                    </div>

                    @foreach($addresses as $address)

                        <form action="/admin/All_Address/Update" method="post">
                            @csrf
                            <div class=" border-bottom">
                                <div class="d-flex bd-highlight m-3">
                                    <div class="col text-center">{{substr($address->post,0,3)}}
                                        -{{substr($address->post,4,7)}}</div>
                                    <div class="col text-center">{{$address->add1}}</div>
                                    <div class="col text-center">{{$address->add2}}</div>
                                    <div class="col text-center">{{$address->toname}}</div>
                                    <div class="col text-center">{{$address->name}}</div>
                                    <div class="col text-center">{{$address->updated_at->format('Y年m月d日')}}</div>
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-primary">EDIT</button>
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
    </div>
    </div>
@endsection