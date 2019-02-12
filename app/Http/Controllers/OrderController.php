<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //view
    public function view()
    {
        $message = null;

        $orders = Order::join('users', 'users.id', '=', 'orders.userid')
            ->join('items', 'items.id', '=', 'orders.itemid')
            ->select('orders.id',
                'orders.itemid as itemid',
                'items.name as itemname',
                'orders.userid as userid',
                'users.name as username',
                'orders.cnt',
                'orders.paydate',
                'orders.pconfirmorid',
                'orders.shipdate',
                'orders.created_at',
                'orders.updaterid',
                'orders.created_at as created_at',
                'orders.updated_at')
            ->OrderBy('orders.id', '1')
            ->paginate(10);

        return view('/admin/All_Order', compact('orders', 'message'));
    }





//===========================================================================================================
//
//===========================================================================================================
    public function search(Request $request)
    {

        $message = null;
        if ($request->keyword) {
            $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
            $vkeyword = implode($vkeyword);


            if ($request->clumn == 'itemname') {

                $orders = Order::join('users', 'users.id', '=', 'orders.userid')
                    ->join('items', 'items.id', '=', 'orders.itemid')
                    ->select('orders.id as id',
                        'orders.itemid as itemid',
                        'items.name as itemname',
                        'orders.userid as userid',
                        'users.name as username',
                        'orders.cnt',
                        'orders.paydate',
                        'orders.pconfirmorid',
                        'orders.shipdate',
                        'orders.created_at',
                        'orders.updaterid',
                        'orders.created_at as created_at',
                        'orders.updated_at as updated_at')
                    ->where('items.name', 'like', '%' . $vkeyword . '%')
                    ->OrderBy('orders.id', '1')
                    ->paginate(10);

            } else if ($request->clumn == 'username') {

                $orders = Order::join('users', 'users.id', '=', 'orders.userid')
                    ->join('items', 'items.id', '=', 'orders.itemid')
                    ->select('orders.id as id',
                        'orders.itemid as itemid',
                        'items.name as itemname',
                        'orders.userid as userid',
                        'users.name as username',
                        'orders.cnt',
                        'orders.paydate',
                        'orders.pconfirmorid',
                        'orders.shipdate',
                        'orders.created_at',
                        'orders.updaterid',
                        'orders.created_at as created_at',
                        'orders.updated_at as updated_at')
                    ->where('users.name', 'like', '%' . $vkeyword . '%')
                    ->OrderBy('orders.id', '1')
                    ->paginate(10);
            } else {

                $orders = Order::join('users', 'users.id', '=', 'orders.userid')
                    ->join('items', 'items.id', '=', 'orders.itemid')
                    ->select('orders.id as id',
                        'orders.itemid as itemid',
                        'items.name as itemname',
                        'orders.userid as userid',
                        'users.name as username',
                        'orders.cnt',
                        'orders.paydate',
                        'orders.pconfirmorid',
                        'orders.shipdate',
                        'orders.created_at',
                        'orders.updaterid',
                        'orders.created_at as created_at',
                        'orders.updated_at as updated_at')
                    ->where('orders.' . $request->clumn, 'like', '%' . $vkeyword . '%')
                    ->OrderBy('orders.id', '1')
                    ->paginate(10);

            }

            return view('/admin/All_Order', compact('orders','message'));

        }

        return redirect('/admin/All_Order');
    }





//============================================================================================================
//
//============================================================================================================
    public function editview(Request $request)
    {
        $message = null;
        $deletemessage = null;
        $orderid = $request->orderid;

        $order = Order::join('users', 'users.id', '=', 'orders.userid')
            ->join('items', 'items.id', '=', 'orders.itemid')
            ->join('addresses', 'addresses.id', '=', 'orders.addressid')
            ->where('orders.id', $orderid)
            ->select('orders.id',
                'users.name as username',
                'items.name as itemname',
                'orders.cnt as cnt',
                'addresses.toname as toname',
                'addresses.post as post',
                'addresses.add1 as add1',
                'addresses.add2 as add2',
                'orders.paydate as paydate',
                'orders.pconfirmorid as pconfirmorid',
                'orders.shipdate as shipdate',
                'orders.updaterid as updaterid',
                'orders.created_at as created_at',
                'orders.updated_at as updated_at')
            ->get();

        return view('/admin/Edit_Order', compact('order', 'message', 'deletemessage'));
    }





//===========================================================================================================
//
//===========================================================================================================
    public function dalete(Request $request)
    {

        $orderid = $request->orderid;
        $message = null;
        $deletemessage = null;
        $clumn = $request->clumn;

        //判断
        if ($clumn == 'paydate') {

            Order::where('orderid', $orderid)
                ->update(['paydate' => null,
                    'updaterid' => $request->userid,
                    'updated_at' => now()]);

        } elseif ($clumn == 'pconfirmorid') {

            Order::where('orderid', $orderid)
                ->update(['pconfirmorid' => null,
                    'updaterid' => $request->userid,
                    'updated_at' => now()]);

        } elseif ($clumn == 'shipdate') {

            Order::where('orderid', $orderid)
                ->update(['shipdate' => null,
                    'updaterid' => $request->userid,
                    'updated_at' => now()]);

        }

        $deletemessage = $clumn . 'を取り消しました';

        $order = Order::join('users', 'users.id', '=', 'orders.userid')
            ->join('items', 'items.id', '=', 'orders.itemid')
            ->join('addresses', 'addresses.id', '=', 'orders.addressid')
            ->where('orderid', $orderid)
            ->select('orders.id',
                'users.name as username',
                'items.name as itemname',
                'orders.cnt as cnt',
                'addresses.toname as toname',
                'addresses.post as post',
                'addresses.add2 as add1',
                'addresses.add2 as add2',
                'orders.paydate as paydate',
                'orders.pconfirmorid as pconfirmorid',
                'orders.shipdate as shipdate',
                'orders.updaterid as updaterid',
                'orders.created_at as created_at',
                'orders.updated_at as updated_at')
            ->get();

        return view('/admin/Edit_Order', compact('order', 'message', 'deletemessage'));


    }



//===========================================================================================================
//
//===========================================================================================================
    public function paydate(Request $request)
    {
        Order::where('id', $request->orderid)
            ->update(['paydate' => now()]);


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
            ->OrderBy('orders.id', '1')
            ->paginate(10);


        return view('/History_Cart', compact('items'));
    }





//===========================================================================================================
//
//===========================================================================================================
    public function payconfirmation(Request $request)
    {

        $message = null;
        $order = Order::where('id', $request->orderid)->value('userid');

        if ($order <> $request->userid) {
            Order::where('id', $request->orderid)
                ->update(['pconfirmorid' => $request->userid, 'updated_at' => now()]);

            $message = $request->orderid.'の支払確認完了しました。受取申請が届くまでお待ちください';
        }else{
            $message =  $request->orderid.'の支払確認完了しませんでした。';
        }


        $orders = Order::join('users', 'users.id', '=', 'orders.userid')
            ->join('items', 'items.id', '=', 'orders.itemid')
            ->select('orders.id as id',
                'orders.itemid as itemid',
                'items.name as itemname',
                'orders.userid as userid',
                'users.name as username',
                'orders.cnt',
                'orders.paydate',
                'orders.pconfirmorid',
                'orders.shipdate',
                'orders.created_at',
                'orders.updaterid',
                'orders.updated_at')
            ->OrderBy('orders.id', '1')
            ->paginate(10);

        return view('/admin/All_Order', compact('orders', 'message'));
    }


//===========================================================================================================
//
//===========================================================================================================
    public function shipconfirmation(Request $request)
    {
        Order::where('id', $request->orderid)
            ->update(['shipdate' => now()]);

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
//テンプレート
//======================================================================================================================
//
//======================================================================================================================
    //public function (){
    //
    //}
}
