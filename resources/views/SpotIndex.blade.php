@extends('layouts.tripapp')


@section('content')

    <h2 class="col-lg-12 m-3">New Article</h2>

    <div class="col-lg-12 m-4 text-center">
        <img src="img/s_line.png">
    </div>

    <div class="m-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="img/noimage.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <button class="btn btn-primary" type="submit">
                    Detail
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-12 m-4 text-center">
        <img src="img/s_line.png">
    </div>

    <div class="row cart-columns">
        @foreach($spots as $spot)
            <div class="card m-2" style="width: 18rem;">
                @if($spot->image == null)
                    <img src="img/noimage.png" alt="Card image cap" class="card-img-top">
                @else
                    <img src="storage/spots/{{$spot->id}}/{{$spot->image}}" alt="Card image cap" class="card-img-top">
                @endif

                <div class="card-body text-center">
                    <h5 class="card-title">{{$spot->spotname}}</h5>
                    <form action="/Detail_Spot" method="get">
                        @csrf
                        <input type="hidden" value="{{$spot->id}}" name="spotid">
                        <button class="btn btn-primary" type="submit">
                            Detail
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>


    <div class="col-lg-12 m-4 text-center">
        <img src="img/s_line.png">

        <div class="m-3 col-lg-12 text-justify">
            {!! $spots->appends(Request::query())->links() !!}
        </div>

        <img src="img/s_line.png">
    </div>

@endsection