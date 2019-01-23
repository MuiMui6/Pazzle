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
                    <form action="/admin/All_Size" method="get">
                        <div class="input-group mr-3">
                            <input type="text" class="form-control"
                                   placeholder=" height / width / Creater Name  "
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
                        <div class="col text-center"><h4>Height</h4></div>
                        <div class="col text-center"><h4>Width</h4></div>
                        <div class="col text-center"><h4>Creater</h4></div>
                        <div class="col text-center"><h4>CreateDate</h4></div>
                        <div class="col text-center"><h4>Updater</h4></div>
                        <div class="col text-center"><h4>UpdateDate</h4></div>
                        <div class="col text-center"><h4>Button</h4></div>
                    </div>

                    <form action="/admin/All_Size/Create" method="post">
                        @csrf
                        <div class=" border-bottom">
                            <div class="d-flex bd-highlight m-3">
                                <div class="col text-center"><input type="text" name="height" class="form-control">
                                </div>
                                <div class="col text-center"><input type="text" name="width" class="form-control">
                                </div>
                                <div class="col text-center">{{Auth::user()->name}}</div>
                                <div class="col text-center"></div>
                                <div class="col text-center"></div>
                                <div class="col text-center"></div>
                                <div class="col text-center">
                                    <th class="text-center">
                                        <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                        <button type="submit" class="btn btn-primary">Create!</button>
                                    </th>
                                </div>
                            </div>
                        </div>
                    </form>

                    @foreach($sizes as $size)

                        <form action="/admin/All_Size/Update" method="post">
                            @csrf
                            <div class=" border-bottom">
                                <div class="d-flex bd-highlight m-3">
                                    <div class="col text-center"><input type="text" name="height"
                                                                        class="form-control"
                                                                        placeholder="{{$size->height}}"></div>
                                    <div class="col text-center"><input type="text" name="width"
                                                                        class="form-control"
                                                                        placeholder="{{$size->width}}"></div>
                                    <div class="col text-center">{{$size->creatername}}</div>
                                    <div class="col text-center">{{$size->created_at->format('Y年m月d日')}}</div>
                                    <div class="col text-center">
                                        @foreach($updatername as $updater)
                                            {{$updater->name}}
                                        @endforeach
                                    </div>
                                    <div class="col text-center">{{$size->updated_at->format('Y年m月d日')}}</div>
                                    <div class="col text-center">
                                        <th class="text-center">
                                            <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                            <input type="hidden" value="{{$size->id}}" name="id">
                                            <button type="submit" class="btn btn-primary">Create!</button>
                                        </th>
                                    </div>
                                </div>
                            </div>
                        </form>

                    @endforeach

                </div>

                <div class="col-lg-12 m-3">
                    {!! $sizes->appends(Request::query())->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection