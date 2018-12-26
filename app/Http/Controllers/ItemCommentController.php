<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\ItemComment;
use App\User;

class ItemCommentController extends Controller
{
//表示
//管理者側
    public function view()
    {

        return view('/Admin.All_ItemComment');
    }

//検索
//管理者側
    public function search()
    {

        return view('/Admin.All_ItemComment');
    }

//詳細
//管理者側
    public function detail()
    {

        return view('/Admin.Edit_ItemComment');
    }

//追加
    public function add()
    {

        return view('/Admin.Edit_ItemComment');
    }


//編集
//管理者側
    public function edit()
    {

        return view('/Admin.Edit_ItemComment');
    }

}
