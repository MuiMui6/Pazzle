<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;

class AddressController extends Controller
{
//======================================================================================================================
//
//======================================================================================================================
    public function search(Request $request){

        $addresses = Address::join('users','users.id','=','addresses.userid')
            ->select([
                'addresses.id',
                'addresses.userid as userid',
                'addresses.toname',
                'addresses.post',
                'addresses.add1',
                'addresses.add2',
                'addresses.updaterid',
                'addresses.created_at as created_at',
                'addresses.updated_at as updated_at',
                'users.name'
            ])
            ->orderBy('addresses.created_at','1')
            ->paginate(9);


        $updatername = Address::join('users', 'users.id', '=', 'addresses.updaterid')
            ->distinct('users.name')->get();

        if($request->keyword){

            $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
            $vkeyword = implode($vkeyword);

            $addresses = Address::join('users','users.id','=','addresses.userid')
                ->where('post','like','%'.$vkeyword.'%')
                ->orwhere('add1','like','%'.$vkeyword.'%')
                ->orwhere('add2','like','%'.$vkeyword.'%')
                ->orwhere('toname','like','%'.$vkeyword.'%')
                ->orwhere('name','like','%'.$vkeyword.'%')
                ->select([
                    'addresses.id',
                    'addresses.userid as userid',
                    'addresses.toname',
                    'addresses.post',
                    'addresses.add1',
                    'addresses.add2',
                    'addresses.updaterid',
                    'addresses.created_at as created_at',
                    'addresses.updated_at as updated_at',
                    'users.name'
                ])
                ->orderBy('addresses.created_at','1')
                ->paginate(9);


            $updatername = Address::join('users', 'users.id', '=', 'addresses.updaterid')
                ->distinct('users.name')->get();

        }

        return view('/admin/All_Address',compact('addresses','updatername'));
    }


//======================================================================================================================
//
//======================================================================================================================
    //public function (){
    //
    //}
}
