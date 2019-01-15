<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Address;
use App\Item;
use App\User;
use App\Order;

class OrderController extends Controller
{
    //view
    public function view()
    {
        $orders = Order::OrderBy('created_at')->get();

        return view('/admin/All_Order', compact('orders'));
    }

    //
    public function search(Request $request)
    {
        $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9]+$/']);
        $vkeyword = implode($vkeyword);
        $orders = Order::where($request->searchclumn, 'like', '' . $vkeyword . '')
            ->get();

        return view('/admin/All_Order', compact('orders'));

    }

    //
    public function datesearch(Request $request)
    {

        //初期値
        $startday = $request->startday;
        $endday = $request->endday;
        $conditions = $request->dateclumn;

        if ($startday == null || $startday > now()) {
            $startday = now();
        }

        if ($endday == null || $endday > now()) {
            $endday = Order::min($conditions);
        }


        //全取得
        $orders = Order::get();

        //未払い日
        if ($conditions == 'unpaid') {
            $orders = Order::whereNotBetween('paydate', [$startday, $endday])->paginate(15);
        }

        //支払日
        if ($conditions == 'paid') {
            $orders = Order::whereBetween('paydate', [$startday, $endday])->paginate(15);
        }

        //未受け取り
        if ($conditions == 'unshipped') {
            $orders = Order::whereNotBetween('shipdate', [$startday, $endday])->paginate(15);
        }

        //受取日
        if ($conditions == 'shipped') {
            $orders = Order::whereBetween('shipdate', [$startday, $endday])->paginate(15);
        }

        //アカウント作成日
        if ($conditions == 'created_at') {
            $orders = Order::whereBetween('created_at', [$startday, $endday])->paginate(15);

        }

        //アカウント更新日
        if ($conditions == 'update_at') {
            $orders = Order::whereBetween('update_at', [$startday, $endday])->paginate(15);

        }

        return view('/admin/All_Order', compact('orders'));

    }


    //
    public function editview(Request $request)
    {
        $orderid = $request->orderid;

        $order = Order::join('users','users.id','=','orders.userid')
            ->join('items','items.itemid','=','orders.itemid')
            ->join('addresses','addresses.addressid','=','orders.addressid')
            ->where('orderid', $orderid)
            ->select('orders.orderid',
                'users.name as username',
                'orders.cnt as cnt',
                'addresses.toname as toname',
                'addresses.post as post',
                'addresses.add1 as add1',
                'addresses.add2 as add2',
                'orders.paydate as paydate',
                'orders.shipdate as shipdate',
                'orders.updaterid as updaterid',
                'orders.created_at as created_at',
                'orders.updated_at as updated_at',
                'orders.etc as etc')
            ->get();

        return view('/admin/Edit_Order', compact('order'));
    }

    //編集保存
    public function editsave()
    {

    }


    //
    public function paydate(Request $request)
    {
        Order::where('orderid', $request->orderid)
            ->update(['paydate' => now()]);

        $items = Order::join('items', 'items.itemid', '=', 'orders.itemid')
            ->where('userid', $request->userid)
            ->get();

        return view('/History_Cart', compact('items'));
    }

    //
    public function payconfirmation(Request $request)
    {

        $orders = Order::OrderBy('created_at')->get();


        Order::where('orderid', $request->orderid)
            ->update(['pconfirmorid' => $request->userid]);

        return view('/admin/All_Order', compact('orders'));
    }

    //
    public function shipconfirmation(Request $request)
    {
        Order::where('orderid', $request->orderid)
            ->update(['shipdate' => now()]);

        $items = Order::join('items', 'items.itemid', '=', 'orders.itemid')
            ->where('userid', $request->userid)
            ->get();

        return view('/History_Cart', compact('items'));
    }

    //テンプレート
    //
    //public function (){
    //
    //}
}
