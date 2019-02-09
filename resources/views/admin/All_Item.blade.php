@extends('layouts.notapp')

@section('content')

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All Item</h3>
                    <p class="text-center">商品一覧</p>
                </div>
                <div class="col-lg-12 m-3">
                    <h5>I can manage the information about the sightseeing Item.</h5>
                    <p>商品に関する情報を管理することが出来ます。</p>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/admin/Register_Item" method="get">
                        <button class="btn btn-danger">
                            New Register Item
                        </button>
                    </form>
                </div>
                @if($message <> null)
                    <div class="alert alert-info m-3">
                        {{$message}}
                    </div>
                @endif
                <div class="col-lg-12 m-3">
                    <form action="/admin/All_Item/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search Clumn　/　検索項目
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Item Id　/　商品ID</button>
                                    <button class="dropdown-item" value="itemname" name="clumn">Item Name　/　商品名</button>
                                    <button class="dropdown-item" value="price" name="clumn">Price　/　金額</button>
                                    <button class="dropdown-item" value="height" name="clumn">Height　/　縦幅</button>
                                    <button class="dropdown-item" value="width" name="clumn">Width　/　横幅</button>
                                    <button class="dropdown-item" value="cnt" name="clumn">Peas Cnt　/　ピース数</button>
                                    <button class="dropdown-item" value="tag" name="clumn">Spot Tag　/　観光地タグ</button>
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
                            <th class="text-center">
                                <h5>Item ID</h5>
                                <p></p>
                            </th>
                            <th class="text-center">
                                <h5>Item Name</h5>
                                <p></p>
                            </th>
                            <th class="text-center">
                                <h5>Size</h5>
                                <p></p>
                            </th>
                            <th class="text-center">
                                <h5>Peas</h5>
                                <p></p>
                            </th>
                            <th class="text-center">
                                <h5>Price</h5>
                                <p></p>
                            </th>
                            <th class="text-center">
                                <h5>View</h5>
                                <p></p>
                            </th>
                            <th class="text-center">
                                <h5>Created Date</h5>
                                <p></p>
                            </th>
                            <th class="text-center">
                                <h5>Updated Date</h5>
                                <p></p>
                            </th>
                            <th class="text-center">
                                <h5>EDIT</h5>
                                <p></p>
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <th class="text-center">{{$item->id}}</th>
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