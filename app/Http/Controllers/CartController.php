<?php

namespace App\Http\Controllers;

use App\Address;
use App\ItemComment;
use App\Order;
use App\Peas;
use App\Size;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            ->join('peases', 'items.sizeid', '=', 'peases.id')
            ->join('sizes', 'items.sizeid', '=', 'sizes.id')
            ->select('items.id', 'items.name', 'items.profile', 'items.image', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
            ->where('items.id', $request->itemid)
            ->Get();

        //ピース数
        $peas = Peas::select('cnt')->get();

        //サイズ
        $size = Size::select('height', 'width')->get();


        $itemcomments = ItemComment::join('users', 'users.id', '=', 'item_comments.userid')
            ->where('itemid', $request->itemid)
            ->where('item_comments.view', '1')
            ->get();

        $evaluation = ItemComment::where('itemid', $request->itemid)
            ->avg('evaluation');


        $index = $request->itemid;
        $itemcnt = $request->itemcnt;
        $message = null;

        $items = DB::select("SELECT * FROM items where id = ?", [$index]);


        if ($itemcnt > 0) {

            if (count($items)) {
                $CartItems = request()->session()->get("CART", []);
                $CartItems[] = $items[0];

                $CartItemCnt = request()->session()->get("CARTCNT", []);
                $CartItemCnt[] = $itemcnt[0];

                request()->session()->put("CART", $CartItems);
                request()->session()->put("CARTCNT", $CartItemCnt);

                $message = '商品をカートに追加しました。';

                return view("/Detail_Item", compact('message', 'item', 'peas', 'size', 'itemcomments', 'evaluation'));

            } else {

                return abort(404);

            }

        } else {

            $message = '購入個数を指定してください';

            return view("/Detail_Item", compact('message', 'item', 'peas', 'size'));
        }
    }


//カート内の物を削除（１件）
    public function delete(Request $request)
    {
        $index = $request->index;
        $items = DB::select("SELECT * FROM items where id = ?", [$index]);
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

        $secretkey = $request->secretkey;
        $anser = User::where('id', $request->userid)->value('anser');

        if ($anser == $secretkey && $request->itemcnt > 0) {

            //アドレス指定
            $address = Address::where('userid', $request->userid)->get();

            return view('/Register_Topost', compact('address'));

        } else {


            $count = $request->count;

            if ($count > 2) {
                $CartItems = request()->session()->forget("CART");
                $CartItems = request()->session()->forget("CARTCNT");
                Auth::logout();
                return redirect('/');
            } else {
                return redirect('/Confirmation_Cart');
            }
        }
    }


//最終確認
    public function Register(Request $request)
    {

        $address = Address::where('id', $request->addressid)->get();
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
                'itemid' => $item->id,
                'cnt' => $itemcnt,
                'addressid' => $request->addid,
                'created_at' => now()
            ]);


        }
        $CartItems = request()->session()->forget("CART");
        $CartItems = request()->session()->forget("CARTCNT");

        return view('/Registerd_Cart');
    }

    public function History(Request $request)
    {
        $items = Order::join('items', 'items.id', '=', 'orders.itemid')
            ->where('userid', $request->userid)
            ->select('orders.id as id',
                'items.name as name',
                'orders.cnt as cnt',
                'items.price',
                'orders.paydate',
                'orders.pconfirmorid',
                'orders.shipdate',
                'orders.created_at as created_at',
                'orders.updaterid as updaterid',
                'orders.updated_at as updated_at')
            ->orderby('orders.created_at', '1')
            ->paginate(10);

        return view('/History_Cart', compact('items'));
    }


//======================================================================================================================
//
//======================================================================================================================
    //public function (){
    //
    //}

}
