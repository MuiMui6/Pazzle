<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tag;

class TagController extends Controller
{
//表示
    public function view()
    {

        return view('/Admin.All_Tag');
    }


//検索
    public function search()
    {

        return view('/Admin.All_Tag');
    }

//詳細
    public function detail()
    {

        return view('/Admin.Edit_Tag');
    }

//追加
    public function add()
    {

        return view('/Admin.Edit_Tag');
    }

//編集
    public function edit()
    {

        return view('/Admin.Edit_Tag');
    }

}
