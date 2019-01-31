@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All Address</h3>
                </div>
                <div class="col m-3">
                    <h5>住所に関する情報を確認・編集できます。</h5>
                </div>

                <div class="col-lg-12 m-3 mb-4">
                    <form action="/admin/All_Address/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search Clumn
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Address Id</button>
                                    <button class="dropdown-item" value="post" name="clumn">Post</button>
                                    <button class="dropdown-item" value="add1" name="clumn">Add1</button>
                                    <button class="dropdown-item" value="add2" name="clumn">Add2</button>
                                    <button class="dropdown-item" value="toname" name="clumn">Toname</button>
                                    <button class="dropdown-item" value="name" name="clumn">Name</button>
                                    <button class="dropdown-item" value="userid" name="clumn">Userid</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-lg-12 m-3">
                    {!! $addresses->appends(Request::query())->links() !!}
                </div>

                <div class="col-lg-12 m-3">

                    <form action="/admin/All_Address/Detail" method="get">
                        @csrf
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center"><h4>Post</h4></th>
                                <th class="text-center"><h4>Add 1</h4></th>
                                <th class="text-center"><h4>Add 2</h4></th>
                                <th class="text-center"><h4>To Name</h4></th>
                                <th class="text-center"><h4>Creater</h4></th>
                                <th class="text-center"><h4>Created Date</h4></th>
                                <th class="text-center"><h4>Updated Date</h4></th>
                                <th class="text-center"><h4>EDIT</h4></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($addresses as $address)
                                <tr>
                                    <th class="text-center">{{substr($address->post,0,3)}}
                                        - {{substr($address->post,4,7)}}</th>
                                    <th class="text-center">{{$address->add1}}</th>
                                    <th class="text-center">{{$address->add2}}</th>
                                    <th class="text-center">{{$address->toname}}</th>
                                    <th class="text-center">{{$address->name}}</th>
                                    <th class="text-center">{{$address->created_at->format('Y年m月d日')}}</th>
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
            </div>
        </div>
    </div>
@endsection