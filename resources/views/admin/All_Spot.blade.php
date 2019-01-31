@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

            <div class="col-12 m-3">
                <h3 class="text-center">All Spot</h3>
            </div>
            <div class="m-3">
                <h5>観光地に関する情報を確認・編集できます。</h5>
            </div>

            <div class="col-lg-12 m-3">
                <form action="/admin/All_Spot/Search" method="get">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="submit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                            <div class="dropdown-menu">
                                <button class="dropdown-item" value="id" name="clumn">Spot Id</button>
                                <button class="dropdown-item" value="name" name="clumn">Spot Name</button>
                                <button class="dropdown-item" value="article" name="clumn">Spot Article</button>
                                <button class="dropdown-item" value="post" name="clumn">Spot Post</button>
                                <button class="dropdown-item" value="add1" name="clumn">Spot Add1</button>
                                <button class="dropdown-item" value="add2" name="clumn">Spot Add2</button>
                                <button class="dropdown-item" value="url" name="clumn">Spot URL</button>
                                <button class="dropdown-item" value="tel" name="clumn">Spot Tel</button>
                                <button class="dropdown-item" value="creater" name="clumn">Creater</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-lg-12 m-3">
                {!! $spots->appends(Request::query())->links() !!}
            </div>

            <div class="col-lg-12 m-3">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="text-center"><h4>Spot Name</h4></th>
                        <th class="text-center"><h4>View</h4></th>
                        <th class="text-center"><h4>Creater</h4></th>
                        <th class="text-center"><h4>Created Date</h4></th>
                        <th class="text-center"><h4>Updated Date</h4></th>
                        <th class="text-center"><h4>EDIT</h4></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($spots as $spot)
                        <tr>
                            <th class="text-center">{{$spot->name}}</th>
                            <th class="text-center">
                                @if($spot->view == '1')
                                    <div class="alert alert-success">
                                        Can View
                                    </div>
                                @elseif($spot->view == '0')
                                    <div class="alert alert-danger">
                                        Can't View
                                    </div>
                                @endif
                            </th>
                            <th class="text-center">
                                {{$spot->creater}}
                            </th>
                            <th class="text-center">
                                {{$spot->created_at->format('Y年m月d日')}}
                            </th>
                            <th class="text-center">
                                {{$spot->updated_at->format('Y年m月d日')}}
                            </th>
                            <th class="text-center">
                                <form action="/Edit_Article" method="get">
                                    @csrf
                                    <input type="hidden" value="{{$spot->id}}" name="spotid">
                                    <button class="btn btn-primary">
                                        EDIT
                                    </button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>


        </div>
    </div>
</div>
@endsection