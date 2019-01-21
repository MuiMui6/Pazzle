@extends('layouts.notapp')

@section('content')
    <div class="row card card-body">

        <div class="col-12 m-3">
            <h3 class="text-center">Your Article</h3>
        </div>
        <div class="m-3">
            <h5>{{Auth::user()->name}}さまが書かれた記事の一覧です。</h5>
        </div>
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
                            <div class="alert alert-denger">
                                Can't View
                            </div>
                        @endif
                    </th>
                    <th class="text-center">
                        <form action="/Edit_Article" method="get">
                            <button type="submit" class="btn btn-primary" value="{{$spot->id}}" name="spotid">
                                EDIT
                            </button>
                        </form>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection