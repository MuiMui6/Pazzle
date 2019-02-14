@extends('layouts.app')

@section('content')
    <div class="justify-content-center m-3">
        {!! $item->appends(Request::query())->links() !!}
    </div>

    <div class="row cart-columns">
        @foreach( $item as $items )
            <div class="card m-2" style="width: 17rem;">
                @if($items->image == null)
                    <img class="card-img-top" src="img/{{$items -> name}}.jpg" width="150px" height="200px">
                @else
                    <img class="card-img-top" src="/storage/items/{{$items->id}}/{{$items->image}}" width="150px"
                         height="200px">
                @endif
                <div class="card-body card-text">
                    <table class="table table-borderless">
                        <tbody>
                        {{--商品名--}}
                        <tr>
                            <th scope="row">Name</th>
                            <th>{{$items -> name}}</th>
                        </tr>

                        {{--サイズ--}}
                        <tr>
                            <th scope="row">Size</th>
                            <th>{{$items->height}}×{{$items->width}}（mm）</th>
                        </tr>

                        {{--ピース数--}}
                        <tr>
                            <th scope="row">PeasCnt</th>
                            <th>{{$items->cnt}}peas</th>
                        </tr>
                        </tbody>
                    </table>

                    {{--詳細--}}
                    <form action="/Detail" method="get">
                        @csrf
                        <input type="hidden" value="{{$items->id}}" name="itemid">
                        <button type="submit" class="btn btn-info btn-block">
                        Detail / 詳細
                        </button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>

@endsection
