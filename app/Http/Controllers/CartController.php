<?php

namespace App\Http\Controllers;

use App\Address;
use App\Item;
use App\ItemComment;
use App\Order;
use App\Peas;
use App\Size;
use App\User;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            ->join('peases', 'items.peasid', '=', 'peases.id')
            ->join('sizes', 'items.sizeid', '=', 'sizes.id')
            ->select(
                'items.id',
                'items.name',
                'items.profile',
                'items.image',
                'items.price',
                'peases.cnt',
                'items.tag1 as tag1',
                'items.tag2 as tag2',
                'items.tag3 as tag3',
                'sizes.height',
                'sizes.width')
            ->where('items.id', $request->itemid)
            ->Get();

        //ピース数
        $peas = Peas::select('cnt')->get();

        //サイズ
        $size = Size::select('height', 'width')->get();

        //タグ
        $tag = Tag::select('name')->where('genre', '1')->orwhere('genre', '3')->get();

        $itemcomments = ItemComment::join('users', 'users.id', '=', 'item_comments.userid')
            ->where('itemid', $request->itemid)
            ->where('item_comments.view', '1')
            ->orderBy('item_comments.id', '1')
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

                return view("/Detail_Item", compact('message', 'item', 'peas', 'size', 'itemcomments', 'evaluation','tag'));

            } else {

                return abort(404);

            }

        } else {

            $message = '購入個数を指定してください';

            return view("/Detail_Item", compact('message', 'item', 'peas', 'size', 'itemcomments', 'evaluation','tag'));
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


//確認
    public function cnf_secret(Request $request)
    {
        $itemcnt = $request->itemcnt;
        return view('/Certification_Seacret', compact('itemcnt'));
    }

//宛先決め
    public function Topost(Request $request)
    {
        $anser = User::select('anser')->where('id', $request->userid)->get();

        if ($request->secretkey == $anser) {

            $CartItems = request()->session()->get("CART", []);
            $CartItemCnt = request()->session()->get("CARTCNT", []);
            $itemcnt = 0;

            foreach ($CartItems as $index => $items) {
                $itemcnt = $itemcnt + $CartItemCnt[$index];
            }

            if ($itemcnt > 0) {
                //アドレス指定
                $address = Address::where('userid', $request->userid)->get();
                $authsec = true;

                return view('/Register_Topost', compact('address', 'authsec'));
            }else{
                return abort(404);
            }
        } elseif ($request->secretkey <> $anser) {

                $count = request()->session()->get("COUNTER", 0);
                $count = $count + 1;
                request()->session()->put("COUNTER", $count);

                if ($count > 2) {
                    $CartItems = request()->session()->forget("CART");
                    $CartItems = request()->session()->forget("CARTCNT");
                    Auth::logout();
                    return redirect('/');
                } else {
                    $itemcnt = $request->itemcnt;
                    return view('/Certification_Seacret', compact('itemcnt'));
                }
            }
        $itemcnt = $request->itemcnt;
        return view('/Certification_Seacret', compact('itemcnt'));
    }


//最終確認
    public function Register(Request $request)
    {
        if ($request->authsec == 1) {
            $authsec = $request->authsec;
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

            return view('/Register_Cart', compact('address', 'CartItems', 'price', 'itemcnt', 'CartItemCnt', 'addid','authsec'));
        }
        return redirect('/Cnf_Secret');

    }


//購入後
    public function Registerd(Request $request)
    {

        if ($request->authsec == 1) {
            $CartItems = request()->session()->get("CART", []);
            $CartItemCnt = request()->session()->get("CARTCNT", []);

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
        } else {
            return redirect('/Cnf_Secret');
        }
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
            ->orderby('orders.id', '1')
            ->paginate(10);

        return view('/History_Cart', compact('items'));

    }

//======================================================================================================================
//
//======================================================================================================================
    public
    function oio_view()
    {

        $sizes = Size::get();

        $peases = Peas::get();

        return view('/Register_Order', compact('sizes', 'peases'));
    }

//======================================================================================================================
//
//======================================================================================================================
    public
    function oio_add(Request $request)
    {
        $price = Peas::where('id', $request->peasid)->value('cnt');

        $id = Item::insertGetId([
            'name' => $request->userid . now()->format('Ymd'),
            'sizeid' => $request->sizeid,
            'peasid' => $request->peasid,
            'price' => $price * 1.75,
            'view' => 0,
            'createrid' => $request->userid,
            'created_at' => now(),
            'updaterid' => $request->userid,
            'updated_at' => now()
        ]);


        $items = Item::FindOrFail($id);
        $request->validate(['img' => 'image']);
        //画像登録
        $imgname = now()->format('Ymd') . '.jpg';
        Storage::makeDirectory('public/items/' . $id);
        $request->file('img')->storeAs(
            'public/items/' . $id, $imgname);
        $items->image = $imgname;
        $items->save();

        $index = $request->itemid;
        $itemcnt = $request->itemcnt;

        $items = DB::select("SELECT * FROM items where id = " . $id, [$index]);


        if (count($items)) {
            $CartItems = request()->session()->get("CART", []);
            $CartItems[] = $items[0];

            $CartItemCnt = request()->session()->get("CARTCNT", []);
            $CartItemCnt[] = $itemcnt[0];

            request()->session()->put("CART", $CartItems);
            request()->session()->put("CARTCNT", $CartItemCnt);

            $CartItems = request()->session()->get("CART", []);
            $CartItemCnt = request()->session()->get("CARTCNT", []);


            return redirect('/Confirmation_Cart');


        } else {

            return abort(404);

        }


    }

//======================================================================================================================
//
//======================================================================================================================
//public function (){
//
//}

}
