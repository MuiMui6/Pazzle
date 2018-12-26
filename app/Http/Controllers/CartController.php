<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Address;
use App\Item;
use App\User;

class CartController extends Controller
{
//確認
    public function Confirmor()
    {

        return view('/Confirmor_Cart');
    }

//カート内の物を削除（１件）
    public function delete()
    {

        return view('/Confirmor_Cart');
    }

//カート内の物を削除（全件）
    public function all_delete()
    {

        return view('/Confirmor_Cart');
    }

//宛先決め
    public function Topost()
    {

        return view('/Register_Topost');
    }

//最終確認
    public function Register()
    {

        return view('/Register_Cart');
    }

//購入後
    public function Registerd()
    {

        return view('/Registerd_Cart');
    }

}
