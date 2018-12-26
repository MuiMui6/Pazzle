<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Size;
use App\User;

class SizeController extends Controller
{
//表示
//管理者側
    public function view()
    {

        return view('/Admin.All_Size');
    }

//検索
//管理者側
    public function search()
    {

        return view('/Admin.All_Size');
    }

//詳細
//管理者側
    public function detail()
    {

        return view('/Admin.Edit_Size');
    }

//追加
//管理者側
    public function add()
    {

        return view('/Admin.Edit_Size');
    }

//編集
//管理者側
    public function edit()
    {

        return view('/Admin.Edit_Size');
    }

}
