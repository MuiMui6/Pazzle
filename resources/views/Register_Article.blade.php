@extends('layouts.tripapp')

@section('content')

    <div class="row">
        <div class="card col-lg-12 text-center">
            <div class="card-body">

                <form action="/Save_Article" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="col-12 m-3 text-center">
                        <h3>Register Article</h3>
                        <p>観光地記事登録</p>
                    </div>
                    <div class="col-12 m-3">
                        <h5></h5>
                        <p>観光地記事を作成できます。</p>
                    </div>

                    <div class="col-12 m-3 text-center">
                        <img src="img/s_line.png">
                    </div>

                    <table class="table">
                        <tr>
                            <th class="text-center">
                                Photo
                            </th>
                            <th class="text-center">
                                <p>
                                    <input type="file" name="img" enctype="multipart/form-data">
                                </p>
                                <p>画像ファイル( jpg / png / bmp / gif / svg )のみしか登録できません。</p>
                            </th>
                        </tr>


                        <tr>
                            <th class="text-center">
                                Spot Name(※必須)
                            </th>
                            <th class="text-center">
                                <input type="text" class="form-control" name="name" placeholder="タイトル　2-30文字">
                            </th>
                        </tr>


                        <tr>
                            <th class="text-center">
                                Article(※必須)
                            </th>
                            <th class="text-center">
                                <textarea class="form-control" name="article" cols="50" rows="10"
                                          placeholder="本文 10-500文字"></textarea>
                            </th>
                        </tr>


                        <tr>
                            <th class="text-center">
                                Address
                            </th>
                            <th class="text-center">
                                <div class="input-group m-3">
                                    <img src="img/post.png" class="mr-2" height="30px">
                                    <input type="text" class="form-control" name="post" placeholder="郵便番号　半角数字のみ　7文字">
                                </div>
                                <input type="text" class="form-control m-3" name="add1" placeholder="市区町村　3-5文字">
                                <input type="text" class="form-control m-3" name="add2" placeholder="番地や建物名　3-5文字">
                            </th>
                        </tr>


                        <tr>
                            <th class="text-center">
                                URL
                            </th>
                            <th class="text-center">
                                <input type="url" class="form-control" name="url" placeholder="URL　5~50文字">
                            </th>
                        </tr>


                        <tr>
                            <th class="text-center">
                                TEL
                            </th>
                            <th class="text-center">
                                <input type="tel" class="form-control" name="tel"
                                       placeholder="電話番号・問合せ番号　半角数字のみ　10-13文字">
                            </th>
                        </tr>


                        <tr>
                            <th class="text-center">
                                Item Tag
                            </th>
                            <th class="text-center">
                                <div class="form-group">
                                    <input type="text" class="form-control m-3" name="tag1" placeholder="タグ　2-30文字">
                                    <input type="text" class="form-control m-3" name="tag2" placeholder="タグ　2-30文字">
                                    <input type="text" class="form-control m-3" name="tag3" placeholder="タグ　2-30文字">
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