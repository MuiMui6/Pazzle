<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\ItemComment;
use App\Peas;
use App\Size;
use App\Tag;

class ItemController extends Controller
{
//表示

//管理者側
    public function admin_view()
    {

        return view('/Admin.All_Item');
    }


//検索
//一般ユーザ
    public function user_search(Request $request)
    {
        $keyword = $request->keyword;
        $key_height = $request->key_height;
        $key_width = $request->key_width;

        //テーブル全取得
        $item = DB::table('items')
            ->join('peases', 'items.sizeid', '=', 'peases.peasid')
            ->join('sizes', 'items.sizeid', '=', 'sizes.sizeid')
            ->select('items.itemid', 'items.name', 'items.profile', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
            ->Get();

        //もしキーワードがあれば
        if ($keyword <> null) {
            $item = DB::table('items')
                ->join('peases', 'items.sizeid', '=', 'peases.peasid')
                ->join('sizes', 'items.sizeid', '=', 'sizes.sizeid')
                ->select('items.itemid', 'items.name', 'items.profile', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
                ->orwhere('items.name', 'like', '%' . $keyword . '%')
                ->orwhere('items.profile', 'like', '%' . $keyword . '%')
                ->orwhere('items.price', 'like', '%' . $keyword . '%')
                ->orwhere('peases.cnt', 'like', '%' . $keyword . '%')
                ->Get();
        }

        //もしサイズ指定があれば
        if ($key_height <> null && $key_width <> null) {
            $item = DB::table('items')
                ->join('peases', 'items.sizeid', '=', 'peases.peasid')
                ->join('sizes', 'items.sizeid', '=', 'sizes.sizeid')
                ->select('items.itemid', 'items.name', 'items.profile', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
                ->orwhere('sizes.height', $key_height)
                ->orwhere('sizes.width', $key_width)
                ->Get();
        }

        //ピース数
        $peas = Peas::select('cnt')->Get();

        //サイズ
        $size = Size::select('height', 'width')->Get();

        //タグ
        $tag = Tag::select('name')->Get();


        return view('/home', compact('item', 'peas', 'size', 'tag'));
    }

//管理者側
    public function admin_search(Request $request)
    {

        return view('/Admin.All_Item');
    }

//詳細
//一般ユーザ・管理者共通
    public function detail(Request $request)
    {
        $message = null;

        //テーブル全取得
        $item = DB::table('items')
            ->join('peases', 'items.sizeid', '=', 'peases.peasid')
            ->join('sizes', 'items.sizeid', '=', 'sizes.sizeid')
            ->select('items.itemid', 'items.name', 'items.profile', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
            ->where('items.itemid', $request->itemid)
            ->Get();

        //ピース数
        $peas = Peas::select('cnt')->get();

        //サイズ
        $size = Size::select('height', 'width')->get();

        //タグ
        $tag = Tag::select('name')->get();

        return view('/Detail_Item', compact('item', 'peas', 'size', 'tag','message'));

    }


//追加
//管理者のみ
    public function add(Request $request)
    {
        //バリデーションチェック


        //追加処理


        return view('/admin.Edit_Item');
    }

//編集
//管理者側
    public function edit(Request $request)
    {
        //バリデーションチェック


        //更新処理


        return view('/admin.Edit_Item');
    }

}
