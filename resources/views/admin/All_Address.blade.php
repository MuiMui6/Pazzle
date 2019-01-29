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

                    <form action="/admin/All_Address/Detail" method="get">
                        @csrf
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center"><h4>Post</h4></th>
                                <th class="text-center"><h4>Add1</h4></th>
                                <th class="text-center"><h4>Add2</h4></th>
                                <th class="text-center"><h4>Toname</h4></th>
                                <th class="text-center"><h4>Creater</h4></th>
                                <th class="text-center"><h4>UpdateDate</h4></th>
                                <th class="text-center"><h4>Edit</h4></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($addresses as $address)
                                <tr>
                                    <th class="text-center">{{substr($address->post,0,3)}}
                                        -{{substr($address->post,4,7)}}</th>
                                    <th class="text-center">{{$address->add1}}</th>
                                    <th class="text-center">{{$address->add2}}</th>
                                    <th class="text-center">{{$address->toname}}</th>
                                    <th class="text-center">{{$address->name}}</th>
                                    <th class="text-center">{{$address->updated_at->format('Y年m月d日')}}</th>
                                    <th class="text-center">
                                        <button type="submit" class="btn btn-primary">
                                            <input type="hidden" value="{{$address->id}}" name="id">
                                            EDIT
                                        </button>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>
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