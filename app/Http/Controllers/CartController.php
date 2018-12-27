<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Address;
use App\Item;
use App\User;
use App\Peas;
use App\Size;
use App\Tag;

class CartController extends Controller
{
//確認
    public function Confirmor()
    {
        $CartItems = request()->session()->get("CART", []);
        $price = 0;
        $itemcnt = 0;
        foreach ($CartItems as $items) {
            $price = $price + $items->price;
            $itemcnt = $itemcnt + 1;
        }

        return view('/Confirmor_Cart', [
            "CartItems" => $CartItems,
            'price' => $price,
            'itemscnt' => $itemcnt
        ]);
    }

//追加
    public function add(Request $request)
    {
        //テーブル全取得
        $item = DB::table('items')
            ->join('peases', 'items.sizeid', '=', 'peases.peasid')
            ->join('sizes', 'items.sizeid', '=', 'sizes.sizeid')
            ->select('items.itemid', 'items.name', 'items.profile', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
            ->where('items.itemid', $request->itemid)
            ->Get();

        //ピース数
        $peas = Peas::select('cnt')->get();

        //サイズ
        $size = Size::select('height', 'width')->get();

        //タグ
        $tag = Tag::select('name')->get();

        $index = $request->itemid;
        $message = null;
        $items = DB::select("SELECT * FROM items where itemid = ?", [$index]);
        if (count($items)) {
            $CartItems = request()->session()->get("CART", []);
            $CartItems[] = $items[0];
            request()->session()->put("CART", $CartItems);
            $message = '商品をカートに追加しました。';
            return view("/Detail_Item", [
                'message' => $message,
                'item' => $item,
                'peas' => $peas,
                'size' => $item,
                'tag' => $tag
            ]);
        } else {
            return abort(404);
        }
    }

//カート内の物を削除（１件）
    public function delete(Request $request)
    {
        $index = $request->itemid;
        $items = DB::select("SELECT * FROM items Where itemid = ?", [$index]);

        if (count($items) >= 0) {
            $cartItems = request()->session()->get("CART", []);
            unset($cartItems[$index]);;
            request()->session()->put("CART", $cartItems);
            return redirect('Confirmor_Cart');
        } else {
            return abort(404);
        }

    }

//カート内の物を削除（全件）
    public function all_delete()
    {
        $cartItems = request()->session()->forget("CART");
        return redirect('/Confirmor_Cart');
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
