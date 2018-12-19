@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12 m-3">
            <h3 class="text-center">Edit Item</h3>
        </div>
        <div class="m-3">
            <h5>商品に関する情報を編集できます。</h5>
        </div>


        <table class="table table-borderless">
            <tbody>
            <tr>
                <th class="text-center">Image</th>
                <th class="text-left">
                    <input type="file">
                </th>
            </tr>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">
                    <input type="text" class="form-control">
                </th>
            </tr>
            <tr>
                <th class="text-center">Profile</th>
                <th class="text-center"></th>
            </tr>
            <tr>
                <th class="text-center">Tag</th>
                <th class="text-center">
                    <div class="form-inline">
                    @for($i = 1;$i<4;$i++)
                    <div class="dropdown mr-3" for="inlineFormInputGroupUsername2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tag<?php echo $i;?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                        @endfor
                    </div>
                </th>
            </tr>
            <tr>
                <th class="text-center">Size</th>
                <th class="text-center">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Peas Cnt
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </th>
            </tr>
            <tr>
                <th class="text-center">Peas</th>
                <th class="text-center"></th>
            </tr>
            <tr>
                <th class="text-center">Spot</th>
                <th class="text-center"></th>
            </tr>
            <tr>
                <th class="text-center">View</th>
                <th class="text-center">
                    <input type="radio"><span class="m-3 mr-5">View</span>
                    <input type="radio"><span class="m-3">Not View</span>
                </th>
            </tr>
            <tr>
                <th class="text-center">Etc</th>
                <th class="text-center">
                    <textarea rows="5" cols="50" class="form-control"></textarea>
                </th>
            </tr>
            </tbody>
        </table>

    </div>
@endsection