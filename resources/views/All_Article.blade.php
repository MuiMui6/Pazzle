@extends('layouts.tripapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3 text-center">
                    <h3>All Spot Article</h3>
                    <p>観光地記事一覧</p>
                </div>
                <div class="col-12 m-3">
                    <h5>{{Auth::user()->name}}</h5>
                    <p>{{Auth::user()->name}}さまが書かれた記事一覧です。</p>
                </div>


                @if($message <> null)
                    <div class="alert alert-info m-3">
                        {{$message}}
                    </div>
                @endif

                <div class="col-12 m-3 text-center">
                    <img src="img/s_line.png">
                </div>

                <form action="/Edit_Article" method="get">
                    @csrf
                    <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th class="text-center">SpotName</th>
                            <th class="text-center">View</th>
                            <th class="text-center">Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($spots as $spot)
                            <tr>
                                <th class="text-center">{{$spot->name}}</th>
                                <th class="text-center">
                                    @if($spot->view== '1')
                                        <div class="alert alert-success">
                                            Can View
                                        </div>
                                    @else
                                        <div class="alert alert-danger">
                                            Can't View
                                        </div>
                                    @endif
                                </th>
                                <th class="text-center">
                                    <button type="submit" class="btn btn-primary" value="{{$spot->id}}" name="spotid">
                                        EDIT
                                    </button>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection