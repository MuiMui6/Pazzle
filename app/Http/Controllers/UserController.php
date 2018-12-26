<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
//表示
//管理者側
    public function view()
    {

        return view('/Admin.All_User');
    }


//検索
//管理者側
    public function search()
    {

        return view('/Admin.All_User');
    }

//詳細
//管理者側
    public function detail()
    {

        return view('/Admin.Edit_User');
    }

//編集
    public function user_edit()
    {

        return view('/Edit_User');
    }

//管理者側
    public function admin_edit()
    {

        return view('/Admin.Edit_User');
    }

}
