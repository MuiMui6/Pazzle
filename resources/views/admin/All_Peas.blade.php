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

                <div class="col-lg-12 m-4">
                    <form action="/admin/All_Peas" method="get">
                        <div class="input-group mr-3">
                            <input type="text" class="form-control"
                                   placeholder=" PeasCnt / Creater Name "
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
                        <div class="col-lg-2 text-center"><h3>Peas Cnt</h3></div>
                        <div class="col-lg-2 text-center"><h3>Creater</h3></div>
                        <div class="col-lg-2 text-center"><h3>CreateDate</h3></div>
                        <div class="col-lg-2 text-center"><h3>Updater</h3></div>
                        <div class="col-lg-2 text-center"><h3>UpdateDate</h3></div>
                        <div class="col-lg-2 text-center"><h3>Button</h3></div>
                    </div>

                    <form action="/admin/All_Peas/Create" method="post">
                        @csrf
                        <div class=" border-bottom">
                            <div class="d-flex bd-highlight m-3">
                                <div class="col-lg-2 text-center"><input type="text" name="peas" class="form-control">
                                </div>
                                <div class="col-lg-2 text-center">{{Auth::user()->name}}</div>
                                <div class="col-lg-2 text-center"></div>
                                <div class="col-lg-2 text-center"></div>
                                <div class="col-lg-2 text-center"></div>
                                <div class="col-lg-2 text-center">
                                    <th class="text-center">
                                        <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                        <button type="submit" class="btn btn-primary">Create!</button>
                                    </th>
                                </div>
                            </div>
                        </div>
                    </form>


                    @foreach($peases as $peas)

                        <form action="/admin/All_Peas/Update" method="post">
                            @csrf
                            <div class=" border-bottom">
                                <div class="d-flex bd-highlight m-3">
                                    <div class="col-lg-2 text-center"><input type="text" placeholder="{{$peas->cnt}}"
                                                                             name="peas"
                                                                             class="form-control"></div>
                                    <div class="col-lg-2 text-center">{{$peas->creatername}}</div>
                                    <div class="col-lg-2 text-center">{{$peas->created_at->format('Y年m月d日')}}</div>
                                    <div class="col-lg-2 text-center">
                                        @foreach($updatername as $updater)
                                            {{$updater->name}}
                                        @endforeach
                                    </div>
                                    <div class="col-lg-2 text-center">{{$peas->updated_at->format('Y年m月d日')}}</div>
                                    <div class="col-lg-2 text-center">
                                        <th class="col-lg-2 text-center">
                                            <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                            <input type="hidden" value="{{$peas->id}}" name="id">
                                            <button type="submit" class="btn btn-primary">Update!</button>
                                        </th>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>

                <div class="col-lg-12 m-3">
                    {!! $peases->appends(Request::query())->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection