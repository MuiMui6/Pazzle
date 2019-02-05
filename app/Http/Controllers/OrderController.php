<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

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
                'orders.created_at as created_at',
                'orders.updated_at')
            ->OrderBy('orders.created_at', '1')
            ->paginate(10);

        return view('/admin/All_Order', compact('orders', 'vkeyword', 'searchclumn'));
    }





//===========================================================================================================
//
//===========================================================================================================
    public function search(Request $request)
    {

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
                    ->OrderBy('orders.created_at', '1')
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
                    ->OrderBy('orders.created_at', '1')
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
                    ->where('orders.'.$request->clumn,'like','%'.$vkeyword.'%')
                    ->OrderBy('orders.created_at', '1')
                    ->paginate(10);

            }

            return view('/admin/All_Order', compact('orders'));

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
            ->orderby('orders.created_at', '1')
            ->paginate(10);


        return view('/History_Cart', compact('items'));
    }





//===========================================================================================================
//
//===========================================================================================================
    public function payconfirmation(Request $request)
    {

        Order::where('id', $request->orderid)
            ->update(['pconfirmorid' => $request->userid,'updated_at'=>now()]);

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
            ->OrderBy('orders.created_at','1')
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
            ->orderby('orders.created_at', '1')
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
