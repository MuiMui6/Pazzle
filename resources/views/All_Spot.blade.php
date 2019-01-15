@if(Auth::user()->rank == 1)
    @extends('layouts.adminapp')
@else
    @extends('layouts.notapp')
@endif

@section('content')
    <div class="row">

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
                <th class="text-center">AVG Evakuation</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="text-center"><a href="#">観光名所名</a></th>
                <th class="text-center">住所</th>
                <th class="text-center">3.0</th>
            </tr>
            </tbody>
        </table>
    </div>
@endsection