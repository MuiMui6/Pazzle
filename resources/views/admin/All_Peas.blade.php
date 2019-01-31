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
                    <form action="/admin/All_Peas/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search Clumn
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Peas Id</button>
                                    <button class="dropdown-item" value="cnt" name="clumn">Peas Cnt</button>
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
                                <th class="text-center">{{now()->format('Y年m月d日')}}</th>
                                <th class="text-center">
                                    <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                    <button type="submit" class="btn btn-primary">Create!</button>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </form>

                    <p>
                    <h3>Peas List</h3></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center"><h4>Peas Cnt</h4></th>
                            <th class="text-center"><h4>Creater</h4></th>
                            <th class="text-center"><h4>Created Date</h4></th>
                            <th class="text-center"><h4>Updated Date</h4></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($peases as $peas)
                            <tr>
                                <th class="text-center">{{$peas->cnt}}</th>
                                <th class="text-center">{{$peas->creatername}}</th>
                                <th class="text-center">{{$peas->created_at->format('Y年m月d日')}}</th>
                                <th class="text-center">{{$peas->updated_at->format('Y年m月d日')}}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection