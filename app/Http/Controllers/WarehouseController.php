<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\User;
use App\Warehouse;

class WarehouseController extends Controller
{
//表示
    public function view()
    {


        return view('/Admin.All_WareHouse');
    }

//検索
    public function search()
    {

        return view('/Admin.All_WareHouse');
    }

//詳細
    public function detail()
    {

        return view('/Admin.Edit_WareHouse');
    }

//追加
    public function add()
    {

        return view('/Admin.Edit_WareHouse');
    }

//編集
    public function edit()
    {

        return view('/Admin.Edit_WareHouse');
    }

}
