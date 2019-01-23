<div class="row">
    <div class="card col-lg-12">
        <div class="card-body">

            <div class="col-12 m-3">
                <h3 class="text-center">All Peas</h3>
            </div>
            <div class="m-3">
                <h5>ピース数に関する情報を作成・編集できます。</h5>
            </div>

            <div class="col-lg-12 m-3">
                <form action="/admin/All_Peas" method="get">
                    <div class="input-group mr-3">
                        <input type="text" class="form-control" placeholder=" height / width / Creater Name / Updater Name " aria-describedby="button-addon2" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search!
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-12 m-3">

                <div class="d-flex border-bottom border-dark">
                    <div class="col-lg-2 text-center"><h3></h3></div>
                    <div class="col-lg-2 text-center"><h3></h3></div>
                    <div class="col-lg-2 text-center"><h3></h3></div>
                    <div class="col-lg-2 text-center"><h3></h3></div>
                    <div class="col-lg-2 text-center"><h3></h3></div>
                    <div class="col-lg-2 text-center"><h3></h3></div>
                </div>

                @foreach($peases as $peas)

                    <form action="/admin/All_Peas/Update" method="post">
                        @csrf
                        <div class=" border-bottom">
                            <div class="col-lg-2 text-center"></div>
                            <div class="col-lg-2 text-center"></div>
                            <div class="col-lg-2 text-center"></div>
                            <div class="col-lg-2 text-center"></div>
                            <div class="col-lg-2 text-center"></div>
                            <div class="col-lg-2 text-center"></div>
                        </div>
                    </form>

                @endforeach

            </div>

            <div class="col-lg-12 m-3">
                {!! $peases->appends(Request::query())->links() !!}
            </div>

        </div>
    </div>
</div>
@endsection