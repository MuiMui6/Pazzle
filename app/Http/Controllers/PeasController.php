<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Peas;
use App\User;

class PeasController extends Controller
{
//表示
//管理者側
    public function view()
    {
        $peas = Peas::all();

        return view('/Admin.All_Peas', compact('peas'));

    }

//検索
//管理者側
    public function search(Request $request)
    {
        if ($request <> null) {
            $key = $request->keyword;

            $peas = Peas::where('height', 'like', '%' . $key . '%')
                ->orwhere('width', 'like', '%' . $key . '%')
                ->geta();

            return view('/Admin.All_Peas', compact('peas'));
        }
    }

//詳細
//管理者側
    public function admin_detail()
    {

        return view('/Admin.Edit_Peas');
    }

//追加
//管理者側
    public function admin_add()
    {

        return view('/Admin.Edit_Peas');
    }

//編集
//管理者側
    public function admin_edit()
    {

        return view('/Admin.Edit_Peas');
    }

}
