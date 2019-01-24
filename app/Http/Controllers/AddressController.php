<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
//======================================================================================================================
//
//======================================================================================================================
    public function view(Request $request)
    {
        $addresses = Address::where('userid', $request->userid)
            ->orderBy('created_at', '1')
            ->paginate(9);

        return view('/All_Address', compact('addresses'));
    }




//======================================================================================================================
//
//======================================================================================================================
    public function userdetail(Request $request)
    {
        $addresses = Address::where('id', $request->id)->get();

        return view('/Edit_Address', compact('addresses'));
    }


//======================================================================================================================
//
//======================================================================================================================
    public function save(Request $request)
    {

        $vadd = $request->validate([
            'toname' => 'regex:/^[a-zA-Z0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/',
            'post' => 'regex:/^[0-9]+$/',
            'add1' => 'regex:/^[ぁ-んァ-ヶー一-龠]+$/',
            'add2' => 'regex:/^[a-zA-Z0-9ａ-ｚＡ-Ｚ０-９ぁ-んァ-ヶー一-龠]+$/'
        ]);

        Address::insert([
            'userid' => $request->userid,
            'toname' => $request->toname,
            'post' => $request->post,
            'add1' => $request->add1,
            'add2' => $request->add2
        ]);

        $addresses = Address::where('userid', $request->userid)
            ->orderBy('created_at', '1')
            ->paginate(9);

        return view('/All_Address', compact('addresses'));
    }


//======================================================================================================================
//
//======================================================================================================================
    public function create(Request $request)
    {
        return view('/Register_Address');
    }



//======================================================================================================================
//
//======================================================================================================================
    public function userupdate(Request $request)
    {
        $address = Address::findOrFail($request->id);
        $chg = false;


        if ($request->toname <> null) {
            $vtoname = $request->validate(['toname' => 'regex:/^[a-zA-Zａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/']);
            $vtoname = implode($vtoname);
            $address->toname = $vtoname;
            $chg = true;
        }

        if ($request->post) {
            $vpost = $request->validate(['post' => 'regex:/^[0-9]+$/']);
            $vpost = implode($vpost);
            $address->post = $vpost;
            $chg = true;
        }

        if ($request->add1) {
            $vadd1 = $request->validate(['add1' => 'regex:/^[0-9０-９a-zA-Zａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/']);
            $vadd1 = implode($vadd1);
            $address->add1 = $vadd1;
            $chg = true;
        }

        if ($request->add2) {
            $vadd2 = $request->validate(['add2' => 'regex:/^[0-9０-９a-zA-Zａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/']);
            $vadd2 = implode($vadd2);
            $address->add2 = $vadd2;
            $chg = true;
        }

        if ($chg == true) {
            $address->save();
        }

        $addresses = Address::where('userid', $request->userid)
            ->orderBy('created_at', '1')
            ->paginate(9);

        return view('/All_Address', compact('addresses'));
    }


//======================================================================================================================
//
//======================================================================================================================
    public function search(Request $request)
    {

        $addresses = Address::join('users', 'users.id', '=', 'addresses.userid')
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
            ->orderBy('addresses.created_at', '1')
            ->paginate(9);


        $updatername = Address::join('users', 'users.id', '=', 'addresses.updaterid')
            ->distinct('users.name')->get();

        if ($request->keyword) {

            $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
            $vkeyword = implode($vkeyword);

            $addresses = Address::join('users', 'users.id', '=', 'addresses.userid')
                ->where('post', 'like', '%' . $vkeyword . '%')
                ->orwhere('add1', 'like', '%' . $vkeyword . '%')
                ->orwhere('add2', 'like', '%' . $vkeyword . '%')
                ->orwhere('toname', 'like', '%' . $vkeyword . '%')
                ->orwhere('name', 'like', '%' . $vkeyword . '%')
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
                ->orderBy('addresses.created_at', '1')
                ->paginate(9);


            $updatername = Address::join('users', 'users.id', '=', 'addresses.updaterid')
                ->distinct('users.name')->get();

        }

        return view('/admin/All_Address', compact('addresses', 'updatername'));
    }





//======================================================================================================================
//
//======================================================================================================================
    public function detail(Request $request)
    {

        $addresses = Address::join('users', 'users.id', '=', 'addresses.userid')
            ->where('addresses.id', $request->id)
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
            ])->get();


        $updatername = Address::join('users', 'users.id', '=', 'addresses.updaterid')
            ->distinct('users.name')->get();

        return view('/admin/Edit_Address', compact('addresses', 'updatername'));
    }





//======================================================================================================================
//
//======================================================================================================================
    public function update(Request $request)
    {
        $address = Address::findOrFail($request->id);
        $chg = false;

        if ($request->toname <> null) {
            $vtoname = $request->validate(['toname' => 'regex:/^[a-zA-Zａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/']);
            $vtoname = implode($vtoname);
            $address->toname = $vtoname;
            $chg = true;
        }


        if ($request->post <> null) {
            $vpost = $request->validate(['post' => 'regex:/^[0-9]+$/']);
            $vpost = implode($vpost);
            $address->post = $vpost;
            $chg = true;
        }


        if ($request->add1 <> null) {
            $vadd1 = $request->validate(['add1' => 'regex:/^[ぁ-んァ-ヶー一-龠]+$/']);
            $vadd1 = implode($vadd1);
            $address->add1 = $vadd1;
            $chg = true;
        }


        if ($request->add2 <> null) {
            $vadd2 = $request->validate(['add2' => 'regex:/^[a-zA-Z0-9ぁ-んァ-ヶー一-龠]+$/']);
            $vadd2 = implode($vadd2);
            $address->add2 = $vadd2;
            $chg = true;
        }

        if ($chg == true) {
            $address->updaterid = $request->userid;
            $address->save();
        }


        $addresses = Address::join('users', 'users.id', '=', 'addresses.userid')
            ->where('addresses.id', $request->id)
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
            ])->get();


        $updatername = Address::join('users', 'users.id', '=', 'addresses.updaterid')
            ->distinct('users.name')->get();

        return view('/admin/Edit_Address', compact('addresses', 'updatername'));

    }

//======================================================================================================================
//
//======================================================================================================================
    //public function (){
    //
    //}
}
