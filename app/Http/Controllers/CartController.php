<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Address;
use App\Item;
use App\User;
use App\Peas;
use App\Tag;
use App\Size;
use phpDocumentor\Reflection\Types\Integer;

class CartController extends Controller
{
//確認
    public function Confirmation()
    {
        $CartItems = request()->session()->get("CART", []);
        $CartItemCnt = request()->session()->get("CARTCNT", []);

        $itemcnt = 0;
        $price = 0;

        foreach ($CartItems as $index => $items) {
            $itemcnt = $itemcnt + $CartItemCnt[$index];
            $price = $price + ($items->price * $CartItemCnt[$index]);
        }

        return view('/Confirmation_Cart', compact('CartItems', 'price', 'itemcnt', 'CartItemCnt'));
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
        $peas = Peas::select('cnt')->Get();

        //サイズ
        $size = Size::select('height', 'width')->Get();

        //タグ
        $tag = Tag::select('name')->Get();

        $index = $request->itemid;
        $itemcnt = $request->itemcnt;
        $message = null;

        $items = DB::select("SELECT * FROM items where itemid = ?", [$index]);

        if ($itemcnt > 0) {

            if (count($items)) {
                $CartItems = request()->session()->get("CART", []);
                $CartItems[] = $items[0];

                $CartItemCnt = request()->session()->get("CARTCNT", []);
                $CartItemCnt[] = $itemcnt[0];

                request()->session()->put("CART", $CartItems);
                request()->session()->put("CARTCNT", $CartItemCnt);

                $message = '商品をカートに追加しました。';

                return view("/Detail_Item", compact('message', 'item', 'peas', 'size', 'tag'));

            } else {

                return abort(404);

            }

        } else {

            $message = '購入個数を指定してください';

            return view("/Detail_Item", compact('message', 'item', 'peas', 'size', 'tag'));
        }
    }

//カート内の物を削除（１件）
    public function delete(Request $request)
    {
        $index = $request->index;
        $items = DB::select("SELECT * FROM items where itemid = ?", [$index]);
        if (count($items) >= 0) {
            $CartItems = request()->session()->get("CART", []);
            $CartItemCnt = request()->session()->get("CARTCNT", []);
            unset($CartItems[$index]);
            unset($CartItemCnt[$index]);
            request()->session()->put("CART", $CartItems);
            request()->session()->put("CARTCnt", $CartItemCnt);
            return redirect('/Confirmation_Cart');
        } else {
            return abort(404);
        }
    }

//カート内の物を削除（全件）
    public function alldelete()
    {
        $CartItems = request()->session()->forget("CART");
        $CartItems = request()->session()->forget("CARTCNT");
        return redirect('/Confirmation_Cart');
    }

//宛先決め
    public function Topost(Request $request)
    {
        //アドレス指定
        $address = Address::where('userid', $request->userid)->get();

        return view('/Register_Topost', compact('address'));


    }

//最終確認
    public function Register(Request $request)
    {

        $address = Address::where('addressid', $request->addressid)->get();
        $addid = $request->addressid;

        //商品・合計点数・合計金額表示
        $CartItems = request()->session()->get("CART", []);
        $CartItemCnt = request()->session()->get("CARTCNT", []);

        $itemcnt = 0;
        $price = 0;

        foreach ($CartItems as $index => $items) {
            $itemcnt = $itemcnt + $CartItemCnt[$index];
            $price = $price + ($items->price * $CartItemCnt[$index]);
        }

        return view('/Register_Cart', compact('address', 'CartItems', 'price', 'itemcnt', 'CartItemCnt', 'addid'));

    }

//購入後
    public function Registerd(Request $request)
    {

        $CartItems = request()->session()->get("CART", []);
        $CartItemCnt = request()->session()->get("CARTCNT", []);

        $itemcnt = 0;

        foreach ($CartItems as $index => $item) {

            $itemcnt = $CartItemCnt[$index];

            //DB処理（Orderに追加）
            DB::table('orders')->insert([
                'userid' => $request->userid,
                'itemid' => $item->itemid,
                'cnt' => $itemcnt,
                'addressid' => $request->addid,
                'created_at' => now()
            ]);


        }
        $CartItems = request()->session()->forget("CART");
        $CartItems = request()->session()->forget("CARTCNT");

        return view('/Registerd_Cart');
    }

}
