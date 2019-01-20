@extends('layouts.tripapp')

@section('content')

    <div class="row">
        <div class="card col-lg-12 text-center">
            <div class="card-body">

                <form action="/Save_Article" method="post">
                    @csrf

                    <h2 class="card-title">Edit Article</h2>
                    <img src="img/s_line.png">

                    <table class="table">
                        <tr>
                            <th class="text-center">
                                Photo
                            </th>
                            <th class="text-center">
                                <input type="file" name="image">
                            </th>
                        </tr>


                        <tr>
                            <th class="text-center">
                                Spot Name
                            </th>
                            <th class="text-center">
                                <input type="text" class="form-control" name="name">
                            </th>
                        </tr>


                        <tr>
                            <th class="text-center">
                                Article
                            </th>
                            <th class="text-center">
                                <textarea class="form-control" name="article" cols="50" rows="10"></textarea>
                            </th>
                        </tr>


                        <tr>
                            <th class="text-center">
                                Address
                            </th>
                            <th class="text-center">
                                <div class="input-group m-3">
                                    <img src="img/post.png" class="mr-2" height="30px">
                                    <input type="text" class="form-control" name="post">
                                </div>
                                <input type="text" class="form-control m-3" name="add1">
                                <input type="text" class="form-control m-3" name="add2">
                            </th>
                        </tr>


                        <tr>
                            <th class="text-center">
                                URL
                            </th>
                            <th class="text-center">
                                <input type="url" class="form-control" name="url">
                            </th>
                        </tr>


                        <tr>
                            <th class="text-center">
                                TEL
                            </th>
                            <th class="text-center">
                                <input type="tel" class="form-control" name="tel">
                            </th>
                        </tr>


                        <tr>
                            <th class="text-center">
                                Tag
                            </th>
                            <th class="text-center">
                                <div class="form-group col m-3">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->tagid}}" name="tag1">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col m-3">
                                    <select class="form-control" id="exampleFormControlSelect2">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->tagid}}" name="tag2">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col m-3">
                                    <select class="form-control" id="exampleFormControlSelect3">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->tagid}}" name="tag3">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                        </tr>


                        <tr>
                            <th class="text-center">
                                View
                            </th>
                            <th class="text-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="view"
                                           id="inlineRadio1"
                                           value="1" checked>
                                    <label class="form-check-label" for="inlineRadio1">Can View</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="view"
                                           id="inlineRadio2"
                                           value="0">
                                    <label class="form-check-label" for="inlineRadio2">Can't View</label>
                                </div>
                            </th>
                        </tr>


                        <tr>
                            <th class="text-center">
                                Creater Name
                            </th>
                            <th class="text-center">
                                {{Auth::user()->name}}
                                <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                            </th>
                        </tr>

                    </table>

                    <button type="submit" class="btn btn-primary btn-block m-3">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection