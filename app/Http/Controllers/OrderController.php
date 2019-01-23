<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    //view
    public function view()
    {
        $searchclumn = null;
        $vkeyword = null;

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
                'orders.updated_at')
            ->OrderBy('orders.created_at')
            ->paginate(10);

        return view('/admin/All_Order', compact('orders', 'vkeyword', 'searchclumn'));
    }





//===========================================================================================================
//
//===========================================================================================================
    public function search(Request $request)
    {
        $searchclumn = $request->searchclumn;
        $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
        $vkeyword = implode($vkeyword);

        $orders = Order::join('users', 'users.id', '=', 'orders.userid')
            ->join('items', 'items.id', '=', 'orders.itemid')
            ->where($searchclumn, 'like', '%' . $vkeyword . '%')
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
                'orders.updated_at as updated_at')
            ->OrderBy('orders.created_at')
            ->paginate(10);

        return view('/admin/All_Order', compact('orders', 'vkeyword', 'searchclumn'));

    }





//===========================================================================================================
//
//===========================================================================================================
    public function datesearch(Request $request)
    {

        //初期値S
        $startday = $request->startday;
        $endday = $request->endday;
        $conditions = $request->dateclumn;

        $searchclumn = null;
        $vkeyword = null;

        if ($startday == null || $startday > now() || $conditions == 'unpaid' || $conditions == 'unshipped') {
            $startday = now();
        }

        if ($endday == null || $endday > now()) {

            if ($conditions == 'unpaid') {
                $endday = Order::min('paydate');
            } elseif ($conditions == 'unshipped') {
                $endday = Order::min('shipdate');
            } else {
                $endday = Order::min($conditions);
            }
        }

        //全取得
        $orders = Order::paginate(10);

        //未払い日
        if ($conditions == 'unpaid') {
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
                    'orders.updated_at')
                ->whereNotBetween('orders.paydate', [$startday, $endday])
                ->OrderBy('orders.created_at')
                ->paginate(10);
        }

        //支払日
        if ($conditions == 'paid') {
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
                    'orders.updated_at')
                ->whereBetween('orders.paydate', [$startday, $endday])
                ->OrderBy('orders.created_at')
                ->paginate(10);
        }

        //未受け取り
        if ($conditions == 'unshipped') {
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
                    'orders.updated_at')
                ->whereNotBetween('orders.shipdate', [$startday, $endday])
                ->OrderBy('orders.created_at')
                ->paginate(10);
        }

        //受取日
        if ($conditions == 'shipped') {
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
                    'orders.updated_at')
                ->whereBetween('orders.shipdate', [$startday, $endday])
                ->OrderBy('orders.created_at')
                ->paginate(10);
        }

        //アカウント作成日
        if ($conditions == 'created_at') {
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
                    'orders.updated_at')
                ->whereBetween('orders.created_at', [$startday, $endday])
                ->OrderBy('orders.created_at')
                ->paginate(10);

        }

        //アカウント更新日
        if ($conditions == 'updated_at') {
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
                    'orders.updated_at')
                ->whereBetween('orders.updated_at', [$startday, $endday])
                ->OrderBy('orders.created_at')
                ->paginate(10);
        }

        return view('/admin/All_Order', compact('orders', 'vkeyword', 'searchclumn'));

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
            ->where('id', $orderid)
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
            ->get();


        return view('/History_Cart', compact('items'));
    }





//===========================================================================================================
//
//===========================================================================================================
    public function payconfirmation(Request $request)
    {

        $vkeyword = $request->vkeyword;
        $searchclumn = $request->searchclumn;

        Order::where('id', $request->orderid)
            ->update(['pconfirmorid' => $request->userid]);

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
            ->where($searchclumn, 'like', '' . $vkeyword . '')
            ->OrderBy('orders.created_at')
            ->paginate(10);

        return view('/admin/All_Order', compact('orders', 'vkeyword', 'searchclumn'));
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
            ->get();

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
