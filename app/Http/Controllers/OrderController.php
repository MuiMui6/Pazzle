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

    //
    public function paydate(Request $request){
        Order::where('orderid',$request->orderid)
            ->update(['paydate'=>now()]);

        return redirect('/History_Cart/PayDate');
    }

    //
    public function payconfirmation(){

        return redirect('/admin/Edit_Order');
    }

    //
    public function shipdate(){

        return redirect('/admin/Edit_Order');
    }

    //
    public function shipconfirmation(){

        return redirect('/History_Cart/Ship_Confirmation');
    }

    //テンプレート
    //
    //public function (){
    //
    //}
}
