@extends('layouts.tripapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12 text-center">
            <div class="card-body">
                <img src="img/noimage.png" height="500px">


                @foreach($spots as $spot)
                    <h2 class="card-title m-2">{{$spot->spotname}}</h2>

                    <table class="table">

                        <tr>
                            <th class="text-center">
                                Profile
                            </th>
                            <th class="text-center">
                                {{$spot->profile}}
                            </th>
                        </tr>

                        <tr>
                            <th class="text-center">
                                URL
                            </th>
                            <th class="text-center">
                                <a href="{{$spot->url}}">{{$spot->url}}</a>
                            </th>
                        </tr>

                        <tr>
                            <th class="text-center">
                                Tel
                            </th>
                            <th class="text-center">
                                {{$spot->tel}}
                            </th>
                        </tr>

                        <tr>
                            <th class="text-center">
                                Address
                            </th>
                            <th class="text-center">
                                <p>〒{{$spot->post}}</p>
                                <p>{{$spot->add1}}</p>
                                <p>{{$spot->add2}}</p>
                            </th>
                        </tr>

                        <tr>
                            <th class="text-center">
                                Tag
                            </th>
                            <th class="text-center">
                                <p>
                                    @foreach($tag1 as $tag1)
                                        {{ $tag1->name }}
                                    @endforeach
                                </p>
                            </th>
                        </tr>
                    </table>

                    <p class="small">
                        created_at:{{$spot->created_at->format('Y/m/d')}}
                        　/　updater_ad:{{$spot->updated_at->format('Y/m/d')}}
                        　/　by　{{$spot->creatername}}</p>

                @endforeach

            </div>
        </div>
    </div>
@endsection