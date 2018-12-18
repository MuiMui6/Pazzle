@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 m-3">
                <h3 class="text-center">All Spot</h3>
            </div>
            <div class="m-3">
                <h5>観光地一覧です。</h5>
            </div>
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th class="text-center">SpotName</th>
                    <th class="text-center">Address</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th class="text-center">観光名所名</th>
                    <th class="text-center">都道府県</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection