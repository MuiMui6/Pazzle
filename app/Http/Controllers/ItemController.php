<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
//表示
//一般ユーザ
    public function user_view()
    {
        //テーブル全取得
        $item = Item::all();

        return view('/home', compact('item'));
    }

//管理者側
    public function admin_view()
    {
        //テーブル全取得
        $item = Item::all();

        return view('/admin.All_Item', compact('item'));
    }


//検索
//一般ユーザ
    public function user_search(Request $request)
    {
        //キーワードバリデーションチェック
        $keyword = $request->validate(['keyword' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);

        //キーワードをもとに取得
        $item = Item::where('name', 'like', '%' . $keyword . '%')
            ->get();

        return view('/home', compact('item'));
    }

//管理者側
    public function admin_search(Request $request)
    {
        //キーワードバリデーションチェック
        $keyword = $request->validate(['keyword' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);

        //キーワードをもとに取得
        $item = Item::where('name', 'like', '%' . $keyword . '%')
            ->get();

        return view('/admin.All_Item', compact('item'));

    }

//詳細
//一般ユーザ・管理者共通
    public function user_detail(Request $request)
    {
        //itemidをもとに取得
        $item = Item::where('id', $request->itemid)->get();

        return view('/Detail_Item', compact('item'));
    }


//追加
//管理者のみ
    public function admin_add(Request $request)
    {
        //バリデーションチェック


        //追加処理



        return view('/admin.Edit_Item');
    }

//編集
//管理者側
    public function admin_edit(Request $request)
    {
        //バリデーションチェック


        //更新処理


        return view('/admin.Edit_Item');
    }

}
