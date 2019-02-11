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
        $message = null;
        $users = User::where('id', $request->userid)->get();

        return view('/Edit_User', compact('users','message'));

    }




//===============================================================================
//
//===============================================================================
    public function userupdate(Request $request)
    {
        $message = null;
        $user = User::findOrFail($request->userid);
        $chg = false;

        if ($request->name <> null) {
            $vname = $request->validate(['name' => ['regex:/^[a-zA-Zａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/', 'min:1', 'max:30']]);
            $vname = implode($vname);
            $user->name = $vname;
            $chg = true;
        }

        if ($request->email <> null) {
            $vemail = $request->validate(['email' => ['regex:/^[a-zA-Zａ-ｚA-Z@.-]+$/', 'max:30']]);
            $vemail = implode($vemail);
            $user->email = $vemail;
            $chg = true;
        }

        if ($request->pass1 <> null && $request->pass2 <> null && ($request->pass1 == $request->pass2)) {
            $vpass = $request->validate(['pass1' => ['regex:/^[a-zA-Z0-9]+$/', 'min:6'], 'pass2' => ['regex:/^[a-zA-Z0-9]+$/', 'min:6']]);
            $vpass = implode($vpass);
            $user->password = bcrypt($vpass);
            $chg = true;
        }

        if ($request->secretkey <> null) {
            $vanser = $request->validate(['secretkey' => ['regex:/^[0-9a-zA-Z]+$/', 'min:8']]);
            $vanser = implode($vanser);
            $user->anser = $vanser;
            $chg = true;
        }

        if ($chg == true) {
            $user->updated_at = now();
            $user->updaterid = $request->userid;
            $user->save();
            $message = '更新しました';
        }

        $users = User::where('id', $request->userid)->get();

        return view('/Edit_User', compact('users','message'));

    }




//===============================================================================
//
//===============================================================================
    public function adminview()
    {

        $message = null;
        $users = User::orderBy('users.id', '1')
            ->paginate(10);

        return view('/admin/All_User', compact('users','message'));
    }

//===============================================================================
//
//===============================================================================
    public function search(Request $request)
    {

        $message = null;
        $users = User::where($request->clumn, 'like', '%' . $request->keyword . '%')
            ->orderBy('users.id', '1')
            ->paginate(10);

        return view('/admin/All_User', compact('users','message'));
    }




//===============================================================================
//
//===============================================================================
    public function detail(Request $request)
    {

        $message = null;
        $users = User::where('id', $request->id)->get();

        return view('/admin/Edit_User', compact('users','message'));

    }



//===============================================================================
//
//===============================================================================
    public function update(Request $request)
    {
        $message = null;
        $user = User::findOrFail($request->id);
        $chg = false;

        if ($request->name <> null) {
            $vname = $request->validate(['name' => 'regex:/^[0-9０-９a-zA-Zａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/']);
            $vname = implode($vname);
            $user->name = $vname;
            $chg = true;
        }

        if ($request->email <> null) {
            $vemail = $request->validate(['email' => 'mail', 'regex:/^[a-zA-Z0-9@.-]+$/']);
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
            $message = '更新しました';
        }

        $users = User::where('id', $request->id)->get();

        return view('/admin/Edit_User', compact('users','message'));
    }

//===============================================================================
//
//===============================================================================
    //public function (){
    //
    //}
}
