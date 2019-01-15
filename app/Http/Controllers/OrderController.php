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
    public function editview()
    {

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
