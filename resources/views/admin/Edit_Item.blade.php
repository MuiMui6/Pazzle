@extends('layouts.notapp')

@section('content')

    <div class="row">
        <div class="col-12 m-3">
            <h3 class="text-center">Edit Item</h3>
        </div>
        <div class="m-3">
            <h5>商品に関する情報を編集できます。</h5>
        </div>


        <table class="table table-borderless">
            <tbody>
            <tr>
                <th class="text-center">Image</th>
                <th class="text-left">
                    <input type="file">
                </th>
            </tr>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">
                    <input type="text" class="form-control">
                </th>
            </tr>
            <tr>
                <th class="text-center">Profile</th>
                <th class="text-center">
                    <textarea class="form-control" name="profile" rows="10"></textarea>
                </th>
            </tr>
            <tr>
                <th class="text-center">Size</th>
                <th class="text-center">
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="sizeid">
                            @foreach($sizes as $size)
                                <option name="sizeid" value="{{$size->id}}">{{$size->height}}　mm　×　{{$size->width}} mm</option>
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
                    <input type="radio" value="0" name="view" checked><span class="m-3 mr-5">View</span>
                    <input type="radio" value="1" name="view"><span class="m-3">Not View</span>
                </th>
            </tr>

            <tr>
                <th></th>
                <th>
                    <input type="hidden" name="{{Auth::user()->id}}" value="userid">
                    <button class="btn btn-primary btn-block">保存</button>
                </th>
            </tr>
            </tbody>
        </table>

    </div>
@endsection