@extends('layouts.notapp')

@section('content')

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All Item</h3>
                </div>
                <div class="col-lg-12 m-3">
                    <h5>商品に関する情報を作成・編集できます。</h5>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/admin/Register_Item" method="get">
                        <button class="btn btn-danger">
                            New Register Item
                        </button>
                    </form>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/admin/All_Peas" method="get">
                        <div class="input-group mr-3">
                            <input type="text" class="form-control"
                                   placeholder=" height / width / Creater Name / Updater Name "
                                   aria-describedby="button-addon2" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/admin/Edit_Item" method="get">
                        @csrf
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center"><h4>Item Name</h4></th>
                                <th class="text-center"><h4>Size</h4></th>
                                <th class="text-center"><h4>Peas</h4></th>
                                <th class="text-center"><h4>Price</h4></th>
                                <th class="text-center"><h4>View</h4></th>
                                <th class="text-center"><h4>CreateDate</h4></th>
                                <th class="text-center"><h4>UpdateDate</h4></th>
                                <th class="text-center"><h4>Edit</h4></th>
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
                                        @if($item->view == 0)
                                            <div class="alert alert-success">
                                                Can View
                                            </div>
                                        @elseif($item->view == 1)
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
                                        <input type="hidden" value="{{$item->id}}" name="id">
                                        <button class="btn btn-primary">
                                            EDIT
                                        </button>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>


                </div>

                <div class="col-lg-12 m-3">
                    {!! $items->appends(Request::query())->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection