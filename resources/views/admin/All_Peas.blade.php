@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All Peas</h3>
                    <p class="text-center">ピース一覧</p>
                </div>
                <div class="m-3">
                    <h5>I can manage the information about the peas.</h5>
                    <p>ピースに関する情報を管理できます。</p>
                </div>
                @if($message <> null)
                    <div class="alert alert-info m-3">
                        {{$message}}
                    </div>
                @endif
                <div class="col-lg-12 m-4">
                    <form action="/admin/All_Peas/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search
                                    Clumn　/　検索項目
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Peas Id　/　ピースID</button>
                                    <button class="dropdown-item" value="cnt" name="clumn">Peas Cnt　/　ピース数</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-12 m-3">
                    {!! $peases->appends(Request::query())->links() !!}
                </div>

                <div class="col-lg-12 m-3">

                    <p>
                    <h3>Peas List</h3></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">
                                <h5>Peas ID</h5>
                                <p>ピースID</p>
                            </th>
                            <th class="text-center">
                                <h5>Cnt</h5>
                                <p>ピース数</p>
                            </th>
                            <th class="text-center">
                                <h5>Creater Name</h5>
                                <p>製作者名</p>
                            </th>
                            <th class="text-center">
                                <h5>Creater Date</h5>
                                <p>制作日</p>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($peases as $peas)
                            <tr>
                                <th class="text-center">{{$peas->id}}</th>
                                <th class="text-center">{{$peas->cnt}}</th>
                                <th class="text-center">{{$peas->creatername}}</th>
                                <th class="text-center">{{$peas->created_at->format('Y年m月d日')}}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                    <p>
                    <h3>New Peas</h3></p>
                    <form action="/admin/All_Peas/Create" method="post">
                        @csrf
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th class="text-center">
                                    <input type="text" name="peas" class="form-control" placeholder="Peas Cnt">
                                </th>
                                <th class="text-center">{{Auth::user()->name}}</th>
                                <th class="text-center">{{now()->format('Y年m月d日')}}</th>
                                <th class="text-center">
                                    <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                    <button type="submit" class="btn btn-primary">Create!</button>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection