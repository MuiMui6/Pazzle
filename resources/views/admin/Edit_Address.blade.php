@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">Edit Address</h3>
                </div>
                <div class="m-3">
                    <h5>住所に関する情報を編集できます。</h5>
                </div>
                <form action="/admin/Edit_Address/Update" method="post">
                    @csrf
                    @foreach($addresses as $address)
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th class="text-center">AddressId</th>
                                <th class="text-center">
                                    {{$address->id}}　※変更できません
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">User Name</th>
                                <th class="text-center">
                                    {{$address->name}}　※変更できません
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">ToName</th>
                                <th class="text-center">
                                    <input type="text" class="form-control" placeholder="{{$address->toname}}"
                                           name="toname">
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Post</th>
                                <th class="text-center form-inline">
                                    〒　<input type="text" class="form-control" placeholder="{{$address->post}}"
                                             name="post">
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Address1</th>
                                <th class="text-center">
                                    <input type="text" class="form-control" placeholder="{{$address->add1}}"
                                           name="add1">
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Address2</th>
                                <th class="text-center">
                                    <input type="text" class="form-control" placeholder="{{$address->add2}}"
                                           name="add2">
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Updater</th>
                                <th class="text-center">
                                    @foreach($updatername as $updater)
                                        {{$updater->name}}
                                    @endforeach
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">CreateDate</th>
                                <th class="text-center">
                                    {{$address->created_at->format('Y年m月d日')}}
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">UpdateDate</th>
                                <th class="text-center">
                                    {{$address->updated_at->format('Y年m月d日')}}
                                </th>
                            </tr>
                            </tbody>
                        </table>
                        <div class="col-12 m-3">
                            <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                            <input type="hidden" value="{{$address->id}}" name="id">
                            <input type="submit" value="保存" class="btn btn-block">
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection