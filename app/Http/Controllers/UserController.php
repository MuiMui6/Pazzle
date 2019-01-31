<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

//===============================================================================
//
//===============================================================================
    public function view(Request $request)
    {

        $users = User::where('id', $request->userid)->get();

        return view('/Edit_User', compact('users'));

    }




//===============================================================================
//
//===============================================================================
    public function userupdate(Request $request)
    {

        $user = User::findOrFail($request->userid);
        $chg = false;

        if ($request->name <> null) {
            $vname = $request->validate(['name' => 'regex:/^[a-zA-Zａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/']);
            $vname = implode($vname);
            $user->name = $vname;
            $chg = true;
        }

        if ($request->email <> null) {
            $vemail = $request->validate(['email' => 'regex:/^[a-zA-Zａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/']);
            $vemail = implode($vemail);
            $user->email = $vemail;
            $chg = true;
        }

        if ($request->pass1 <> null && $request->pass2 <> null && $request->pass1 == $request->pass2) {
            $vpass = $request->validate(['pass1' => 'regex:/^[a-zA-Z0-9]+$/', 'pass2' => 'regex:/^[a-zA-Z0-9]+$/']);
            $vpass = implode($vpass);
            $user->password = bcrypt($vpass);
            $chg = true;
        }

        if ($chg == true) {
            $user->updated_at = now();
            $user->updaterid = $request->userid;
            $user->save();
        }

        $users = User::where('id', $request->userid)->get();

        return view('/Edit_User', compact('users'));

    }




//===============================================================================
//
//===============================================================================
    public function adminview()
    {

        $users = User::orderBy('created_at', '1')
            ->paginate(10);

        return view('/admin/All_User', compact('users'));
    }

//===============================================================================
//
//===============================================================================
    public function search(Request $request)
    {

        $users = User::where($request->clumn, 'like', '%' . $request->keyword . '%')
            ->orderBy('created_at', '1')
            ->paginate(10);

        return view('/admin/All_User', compact('users'));
    }




//===============================================================================
//
//===============================================================================
    public function detail(Request $request)
    {

        $users = User::where('id', $request->id)->get();

        return view('/admin/Edit_User', compact('users'));

    }



//===============================================================================
//
//===============================================================================
    public function update(Request $request)
    {

        $user = User::findOrFail($request->id);
        $chg = false;

        if ($request->name <> null) {
            $vname = $request->validate(['name' => 'regex:/^[0-9０-９a-zA-Zａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/']);
            $vname = implode($vname);
            $user->name = $vname;
            $chg = true;
        }

        if ($request->email <> null) {
            $vemail = $request->validate(['email' => 'mail','regex:/^[a-zA-Z0-9@.-]+$/']);
            $vemail = implode($vemail);
            $user->email = $vemail;
            $chg = true;
        }


        if ($request->rank <> $user->rank) {
            $user->rank = $request->rank;
            $chg = true;
        }

        if ($chg == true) {
            $user->updated_at = now();
            $user->updaterid = $request->userid;
            $user->save();
        }

        $users = User::where('id', $request->id)->get();

        return view('/admin/Edit_User', compact('users'));
    }

//===============================================================================
//
//===============================================================================
    //public function (){
    //
    //}
}
