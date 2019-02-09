@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All Address</h3>
                    <p class="text-center">住所一覧</p>
                </div>
                <div class="col m-3">
                    <h5>I can manage the information about the sightseeing Address.</h5>
                    <p>住所に関する情報を管理することが出来ます。</p>
                </div>

                @if($message <> null)
                    <div class="alert alert-info m-3">
                        {{$message}}
                    </div>
                @endif

                <div class="col-lg-12 m-3 mb-4">
                    <form action="/admin/All_Address/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search
                                    Clumn　/　検索項目
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Address Id　/　住所ID</button>
                                    <button class="dropdown-item" value="post" name="clumn">Post　/　郵便番号</button>
                                    <button class="dropdown-item" value="add1" name="clumn">Add1　/　住所１</button>
                                    <button class="dropdown-item" value="add2" name="clumn">Add2　/　住所２</button>
                                    <button class="dropdown-item" value="toname" name="clumn">Toname　/　宛先名</button>
                                    <button class="dropdown-item" value="name" name="clumn">Name　/　ユーザ名</button>
                                    <button class="dropdown-item" value="userid" name="clumn">Userid　/　ユーザID</button>
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
                                <th class="text-center">
                                    <h5>Address ID</h5>
                                    <p>住所ID</p>
                                </th>
                                <th class="text-center">
                                    <h5>Post</h5>
                                    <p>郵便番号</p>
                                </th>
                                <th class="text-center">
                                    <h5>Add 1</h5>
                                    <p>住所１</p>
                                </th>
                                <th class="text-center">
                                    <h5>Add 2</h5>
                                    <p>住所２</p>
                                </th>
                                <th class="text-center">
                                    <h5>To Name</h5>
                                    <p>宛先名</p>
                                </th>
                                <th class="text-center">
                                    <h5>Creater Name</h5>
                                    <p>製作者</p>
                                </th>
                                <th class="text-center">
                                    <h5>Created Date</h5>
                                    <p>制作日</p>
                                </th>
                                <th class="text-center">
                                    <h5>Updated Date</h5>
                                    <p>更新日</p>
                                </th>
                                <th class="text-center">
                                    <h5>EDIT</h5>
                                    <p>編集</p>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($addresses as $address)
                                <tr>
                                    <th class="text-center">{{$address->id}}</th>
                                    <th class="text-center">{{substr($address->post,0,3)}}
                                        - {{substr($address->post,4,7)}}</th>
                                    <th class="text-center">{{$address->add1}}</th>
                                    <th class="text-center">{{$address->add2}}</th>
                                    <th class="text-center">{{$address->toname}}</th>
                                    <th class="text-center">{{$address->name}}</th>
                                    <th class="text-center">{{$address->updated_at->format('Y年m月d日')}}</th>
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