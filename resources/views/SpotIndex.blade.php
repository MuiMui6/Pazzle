@extends('layouts.tripapp')


@section('content')

    <h2 class="col-lg-12 m-3">New Article</h2>

    <div class="col-lg-12 m-4 text-center">
        <img src="img/s_line.png">
    </div>

    <div class="m-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="img/出雲大社１.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p>
                    <span class="badge badge-pill badge-secondary">Tags</span>
                    <span class="badge badge-pill badge-secondary">Tags</span>
                    <span class="badge badge-pill badge-secondary">Tags</span>
                </p>
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
                <img class="card-img-top" src="img/出雲大社１.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$spot->name}}</h5>
                    <p>
                        <span class="badge badge-pill badge-secondary">Tags</span>
                        <span class="badge badge-pill badge-secondary">Tags</span>
                        <span class="badge badge-pill badge-secondary">Tags</span>
                    </p>
                    <form action="/Detail_Spot" method="get">
                        @csrf
                        <input type="hidden" value="{{$spot->spotid}}" name="spotid">
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
    </div>

@endsection