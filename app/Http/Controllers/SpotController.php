<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Spot;
use App\SpotComment;
use App\Item;
use App\User;

class SpotController extends Controller
{
//表示
//管理者側
    public function view()
    {

        return view('/Admin.All_SpotComment');
    }


//検索
//管理者側
    public function search()
    {

        return view('/Admin.All_SpotComment');
    }

//詳細
//管理者側
    public function detail()
    {

        return view('/Admin.Edit_Spot');
    }

//追加
//一般ユーザ
    public function add()
    {

        return view('/Admin.Edit_Spot');
    }

//編集
//管理者側
    public function edit()
    {

        return view('/Admin.Edit_Spot');
    }

}
