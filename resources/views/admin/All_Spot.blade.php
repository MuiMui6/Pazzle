@extends('layouts.notapp')

@section('content')
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">

                <div class="col-12 m-3">
                    <h3 class="text-center">All Spot Article</h3>
                    <p class="text-center">観光地記事一覧</p>
                </div>
                <div class="m-3">
                    <h5>I can manage the information about the sightseeing spot article.</h5>
                    <p>観光地記事に関する情報の管理をすることができます。</p>
                </div>

                <div class="m-3">
                    <form action="/Edit_New_Article" method="get">
                        @csrf
                        <button class="btn btn-light" value="{{Auth::user()->id}}" name="userid" type="submit">
                            <img src="../img/write.png" height="20px" width="20px"> New Article
                        </button>
                    </form>
                </div>

                <div class="col-lg-12 m-3">
                    <form action="/admin/All_Spot/Search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="submit"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search Clumn　/　検索項目
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" value="id" name="clumn">Spot Id　/　観光地ID</button>
                                    <button class="dropdown-item" value="name" name="clumn">Spot Name　/　観光地名</button>
                                    <button class="dropdown-item" value="article" name="clumn">Spot Article　/　観光地記事</button>
                                    <button class="dropdown-item" value="post" name="clumn">Spot Post　/　郵便番号</button>
                                    <button class="dropdown-item" value="add1" name="clumn">Spot Add1　/　第1住所</button>
                                    <button class="dropdown-item" value="add2" name="clumn">Spot Add2　/　第２住所</button>
                                    <button class="dropdown-item" value="url" name="clumn">Spot URL　/　URL</button>
                                    <button class="dropdown-item" value="tel" name="clumn">Spot Tel　/　電話番号</button>
                                    <button class="dropdown-item" value="creater" name="clumn">Creater Name　/　製作者名</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-lg-12 m-3">
                    {!! $spots->appends(Request::query())->links() !!}
                </div>

                <div class="col-lg-12 m-3">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">
                                <h5>Spot ID</h5>
                                <p>観光地ID</p>
                            </th>
                            <th class="text-center">
                                <h5>Spot Name</h5>
                                <p>観光地名</p>
                            </th>
                            <th class="text-center">
                                <h5>View</h5>
                                <p>可視/不可視</p>
                            </th>
                            <th class="text-center">
                                <h5>Creater Name</h5>
                                <p>製作者名</p>
                            </th>
                            <th class="text-center">
                                <h5>Created Date</h5>
                                <p>制作日</p>
                            </th>
                            <th class="text-center">
                                <h5>Updated Date</h5>
                                <p>更新日</p>
                            </th>
                            <th class="text-center">
                                <h5>EDIT</h5>
                                <p>編集</p>
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($spots as $spot)
                            <tr>
                                <th class="text-center">{{$spot->id}}</th>
                                <th class="text-center">{{$spot->name}}</th>
                                <th class="text-center">
                                    @if($spot->view == '1')
                                        <div class="alert alert-success">
                                            Can View
                                        </div>
                                    @elseif($spot->view == '0')
                                        <div class="alert alert-danger">
                                            Can't View
                                        </div>
                                    @endif
                                </th>
                                <th class="text-center">
                                    {{$spot->creater}}
                                </th>
                                <th class="text-center">
                                    {{$spot->created_at->format('Y年m月d日')}}
                                </th>
                                <th class="text-center">
                                    {{$spot->updated_at->format('Y年m月d日')}}
                                </th>
                                <th class="text-center">
                                    <form action="/Edit_Article" method="get">
                                        @csrf
                                        <input type="hidden" value="{{$spot->id}}" name="spotid">
                                        <button class="btn btn-primary">
                                            編集
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection