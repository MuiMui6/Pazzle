@extends('layouts.notapp')

@section('content')

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All Item</h3>
                </div>
                <div class="col-lg-12 m-3">
                    <h5>商品に関する情報を作成・確認・編集できます。</h5>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/admin/Register_Item" method="get">
                        <button class="btn btn-danger">
                            New Register Item
                        </button>
                    </form>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/admin/All_Item/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search Clumn
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Item Id</button>
                                    <button class="dropdown-item" value="itemname" name="clumn">Item Name</button>
                                    <button class="dropdown-item" value="price" name="clumn">Price</button>
                                    <button class="dropdown-item" value="height" name="clumn">Height</button>
                                    <button class="dropdown-item" value="width" name="clumn">Width</button>
                                    <button class="dropdown-item" value="cnt" name="clumn">Peas Cnt</button>
                                    <button class="dropdown-item" value="tag" name="clumn">Spot Tag</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-lg-12 m-3">
                    {!! $items->appends(Request::query())->links() !!}
                </div>

                <div class="col-lg-12 m-3">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center"><h4>Item Name</h4></th>
                            <th class="text-center"><h4>Size</h4></th>
                            <th class="text-center"><h4>Peas</h4></th>
                            <th class="text-center"><h4>Price</h4></th>
                            <th class="text-center"><h4>View</h4></th>
                            <th class="text-center"><h4>Created Date</h4></th>
                            <th class="text-center"><h4>Updated Date</h4></th>
                            <th class="text-center"><h4>EDIT</h4></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <th class="text-center">{{$item->itemname}}</th>
                                <th class="text-center">{{$item->height}}×{{$item->width}}</th>
                                <th class="text-center">{{$item->cnt}}</th>
                                <th class="text-center">{{$item->price}}</th>
                                <th class="text-center">
                                    @if($item->view == 1)
                                        <div class="alert alert-success">
                                            Can View
                                        </div>
                                    @elseif($item->view == 0)
                                        <div class="alert alert-danger">
                                            Can't View
                                        </div>
                                    @endif
                                </th>
                                <th class="text-center">
                                    {{$item->created_at->format('Y年m月d日')}}
                                </th>
                                <th class="text-center">
                                    {{$item->updated_at->format('Y年m月d日')}}
                                </th>
                                <th class="text-center">
                                    <form action="/admin/Edit_Item" method="get">
                                        @csrf
                                        <input type="hidden" value="{{$item->id}}" name="id">
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