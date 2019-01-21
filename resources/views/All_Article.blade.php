@extends('layouts.notapp')

@section('content')
    <div class="row">

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
                <th class="text-center">Created Date</th>
                <th class="text-center">Updated Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="text-center"></th>
                <th class="text-center"></th>
                <th class="text-center"></th>
                <th class="text-center"></th>
                <th class="text-center"></th>
            </tr>
            </tbody>
        </table>
    </div>
@endsection