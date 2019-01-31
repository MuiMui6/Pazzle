@extends('layouts.notapp')

@section('content')

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All Peas</h3>
                </div>
                <div class="m-3">
                    <h5>ピース数に関する情報を作成・編集できます。</h5>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/admin/All_Size/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search Clumn
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Size Id</button>
                                    <button class="dropdown-item" value="height" name="clumn">Height</button>
                                    <button class="dropdown-item" value="width" name="clumn">Width</button>
                                    <button class="dropdown-item" value="name" name="clumn">Creater</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-lg-12 m-3">
                    {!! $sizes->appends(Request::query())->links() !!}
                </div>

                <div class="col-lg-12 m-3">
                    <p>
                    <h3>New Size</h3></p>
                    <form action="/admin/All_Size/Create" method="post">
                        @csrf
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th class="text-center"><input type="text" name="height" class="form-control"
                                                               placeholder="height"></th>
                                <th class="text-center"><input type="text" name="width" class="form-control"
                                                               placeholder="width"></th>
                                <th class="text-center">{{Auth::user()->name}}</th>
                                <th class="text-center">{{now()->format('Y年m月d日')}}</th>
                                <th class="text-center">{{now()->format('Y年m月d日')}}</th>
                                <th class="text-center">
                                    <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                    <button type="submit" class="btn btn-primary">CREATE</button>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </form>

                    <p>
                    <h3>Size List</h3></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center"><h4>Height(mm)</h4></th>
                            <th class="text-center"><h4>Width(mm)</h4></th>
                            <th class="text-center"><h4>Creater</h4></th>
                            <th class="text-center"><h4>Created Date</h4></th>
                            <th class="text-center"><h4>Updated Date</h4></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sizes as $size)
                            <tr>
                                <th class="text-center">{{$size->height}}</th>
                                <th class="text-center">{{$size->width}}</th>
                                <th class="text-center">{{$size->creatername}}</th>
                                <th class="text-center">{{$size->created_at->format('Y年m月d日')}}</th>
                                <th class="text-center">{{$size->updated_at->format('Y年m月d日')}}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection