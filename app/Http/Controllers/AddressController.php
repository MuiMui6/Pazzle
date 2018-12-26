<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\User;

class AddressController extends Controller
{
//表示
//一般ユーザ
    public function user_view()
    {

        return view('/Edit_Address');
    }

//管理者側
    public function admin_view()
    {

        return view('/Admin.All_Address');
    }

//検索
//管理者側
    public function admin_search()
    {

        return view('/Admin.All_Address');
    }

//詳細
//一般ユーザ
    public function user_detail()
    {

        return view('/Admin.Edit_Address');
    }

//管理者側
    public function admin_detail()
    {

        return view('/Admin.Edit_Address');
    }

//追加
//一般ユーザ
    public function user_add()
    {

        return view('/Edit_Address');
    }

//管理者側
    public function admin_add()
    {

        return view('/Admin.Edit_Address');
    }

//編集
//一般ユーザ
    public function user_edit()
    {

        return view('/Edit_Address');
    }

//管理者側
    public function admin_edit()
    {

        return view('/Admin.Edit_Address');
    }

}
