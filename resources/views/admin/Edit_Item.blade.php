@extends('layouts.notapp')

@section('content')

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">
                <div class="col-12 m-3">
                    <h3 class="text-center">Edit Item</h3>
                </div>
                <div class="col-lg-12 m-3">
                    <h5>商品に関する情報を編集できます。</h5>
                </div>
                <form action="/admin/Edit_Item" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach($items as $item)
                        <div class="col-lg-12 text-center">
                            @if($item->image <> null)
                                <img class="card-img-top" src="../storage/items/{{$item->id}}/{{$item->image}}"
                                     style="height: 400px; width: auto;">
                            @else
                                <img class="card-img-top" src="../img/noimage.png"
                                     style="height: 400px; width: auto;">
                            @endif
                        </div>

                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th class="text-center">Image</th>
                                <th class="text-left">
                                    <p>
                                        <input type="file" name="img">
                                    </p>
                                    <p>画像ファイルは「.jpg」のみしか登録できません。</p>
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="name"
                                           placeholder="{{$item->itemname}}">
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Profile</th>
                                <th class="text-center">
                        <textarea class="form-control" name="profile" rows="10"
                                  placeholder="{{$item->profile}}"></textarea>
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Price</th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="price" placeholder="{{$item->price}}">
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Size</th>
                                <th class="text-center">
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="sizeid">
                                            <option value="null" name="sizeid" selected>{{$item->height}}
                                                　mm　×　{{$item->width}}　mm
                                            </option>
                                            @foreach($sizes as $size)
                                                <option name="sizeid" value="{{$size->id}}">{{$size->height}}
                                                    　mm　×　{{$size->width}}
                                                    mm
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Peas</th>
                                <th class="text-center">
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="peasid">
                                            <option value="null" name="peasid" selected>{{$item->cnt}}　peas</option>
                                            @foreach($peases as $peas)
                                                <option name="peasid" value="{{$peas->id}}">{{$peas->cnt}}　Peas</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">View</th>
                                <th class="text-center">
                                    @switch($item->view)
                                        @case('0')
                                        <input type="radio" value="0" name="view" checked><span class="m-3 mr-5">Can View</span>
                                        <input type="radio" value="1" name="view"><span class="m-3">Can't View</span>
                                        @break
                                        @case('1')
                                        <input type="radio" value="0" name="view"><span class="m-3 mr-5">Can View</span>
                                        <input type="radio" value="1" name="view" checked><span
                                                class="m-3">Can't View</span>
                                        @break
                                    @endswitch
                                </th>
                            </tr>

                            <tr>
                                <th></th>
                                <th>
                                    <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button class="btn btn-primary btn-block">保存</button>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection