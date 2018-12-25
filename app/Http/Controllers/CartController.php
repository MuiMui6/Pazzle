<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;

class CartController extends Controller
{
//表示
    public function view()
    {

    }

//確認
    public function confirmor()
    {

    }

//追加
    public function add(Request $request)
    {
        $items = Item::where('id','=',[$request->itemid]);
        if(count($items)>=0){
            $cartItems = request() -> session() -> get('Cart',[]);
            $cartItems[] = $items[0];
            request()->session()->put("CART",$cartItems);
            return redirect("/Register_Cart");
        }else{
            return abort(404);
        }

    }

//削除
    public function delite()
    {

    }

    //全消去
    public function all_delite(){

    }
}
