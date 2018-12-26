<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Address;
use App\Item;
use App\User;

class OrderController extends Controller
{
//表示
//管理者側
    public function view()
    {

        return view('/Admin.All_Order');
    }


//検索
//管理者側
    public function search()
    {

        return view('/Admin.All_Order');
    }

//詳細
//管理者側
    public function detail()
    {

        return view('/Admin.Edit_Order');
    }

//編集
//管理者側
    public function edit()
    {

        return view('/Admin.Edit_Order');
    }

}
