<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemComment;
use App\Peas;
use App\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
//一般ユーザ
//検索
    public function user_search(Request $request)
    {
        $keyword = $request->keyword;
        $key_height = $request->key_height;
        $key_width = $request->key_width;

        //テーブル全取得
        $item = Item::join('peases', 'items.peasid', '=', 'peases.id')
            ->join('sizes', 'items.sizeid', '=', 'sizes.id')
            ->select('items.id', 'items.name', 'items.profile', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
            ->orderBy('items.created_at', 'desc')
            ->paginate(9);

        //もしキーワードがあれば
        if ($keyword <> null) {
            $item = Item::join('peases', 'items.peasid', '=', 'peases.id')
                ->join('sizes', 'items.sizeid', '=', 'sizes.id')
                ->select('items.id', 'items.name', 'items.profile', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
                ->orwhere('items.name', 'like', '%' . $keyword . '%')
                ->orwhere('items.profile', 'like', '%' . $keyword . '%')
                ->orwhere('items.price', 'like', '%' . $keyword . '%')
                ->orwhere('peases.cnt', 'like', '%' . $keyword . '%')
                ->paginate(9);
        }

        //もしサイズ指定があれば
        if ($key_height <> null && $key_width <> null) {
            $item = Item::join('peases', 'items.peasid', '=', 'peases.id')
                ->join('sizes', 'items.sizeid', '=', 'sizes.id')
                ->select('items.id', 'items.name', 'items.profile', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
                ->orwhere('sizes.height', $key_height)
                ->orwhere('sizes.width', $key_width)
                ->paginate(9);
        }

        //ピース数
        $peas = Peas::select('cnt')->Get();

        //サイズ
        $size = Size::select('height', 'width')->Get();


        return view('/home', compact('item', 'peas', 'size'));
    }

//======================================================================================================================
//一般ユーザ・管理者共通
//======================================================================================================================

    public function detail(Request $request)
    {
        $message = null;

        //テーブル全取得
        $item = DB::table('items')
            ->join('peases', 'items.peasid', '=', 'peases.id')
            ->join('sizes', 'items.sizeid', '=', 'sizes.id')
            ->select('items.id', 'items.name', 'items.profile', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
            ->where('items.id', $request->itemid)
            ->Get();

        //ピース数
        $peas = Peas::select('cnt')->get();

        //サイズ
        $size = Size::select('height', 'width')->get();


        $itemcomments = ItemComment::join('users', 'users.id', '=', 'item_comments.userid')
            ->where('itemid', $request->itemid)
            ->where('item_comments.view', '1')
            ->orderBy('item_comments.created_at', '1')
            ->get();

        $evaluation = ItemComment::where('itemid', $request->itemid)
            ->avg('evaluation');

        return view('/Detail_Item', compact('item', 'peas', 'size', 'message', 'itemcomments', 'evaluation'));

    }



//======================================================================================================================
//管理者商品一覧
//======================================================================================================================
    public function search(Request $request)
    {

        $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
        $vkeyword = implode($vkeyword);

        $items = Item::join('users', 'users.id', '=', 'items.createrid')
            ->join('peases', 'peases.id', '=', 'items.peasid')
            ->join('sizes', 'sizes.id', '=', 'items.sizeid')
            ->where('items.name', 'like', '%' . $vkeyword . '%')
            ->select([
                'items.id as id',
                'items.name as itemname',
                'items.price as price',
                'sizes.height as height',
                'sizes.width as width',
                'peases.cnt as cnt',
                'items.view as view',
                'users.name as username',
                'items.created_at as created_at',
                'items.updated_at as updated_at'
            ])
            ->OrderBy('items.created_at', '1')
            ->paginate(10);

        return view('/admin/All_Item', compact('items'));
    }


//======================================================================================================================
//商品新規追加
//======================================================================================================================
    public function additem(Request $request)
    {

    }



//======================================================================================================================
//商品保存
//======================================================================================================================
    public function save(Request $request)
    {

    }


//======================================================================================================================
//商品編集
//======================================================================================================================
    public function edit(Request $request)
    {
        $items = Item::join('users', 'users.id', '=', 'items.createrid')
            ->join('peases', 'peases.id', '=', 'items.peasid')
            ->join('sizes', 'sizes.id', '=', 'items.sizeid')
            ->where('items.id', $request->id)
            ->select([
                'items.id as id',
                'items.name as itemname',
                'items.price as price',
                'sizes.height as height',
                'sizes.width as width',
                'peases.cnt as cnt',
                'items.view as view',
                'users.name as username',
                'items.created_at as created_at',
                'items.updated_at as updated_at'
            ])
            ->get();

        $sizes = Size::get();

        $peases = Peas::get();

        return view('/admin/Edit_Item', compact('items','sizes','peases'));

    }


//======================================================================================================================
//商品更新
//======================================================================================================================
    public function update(Request $request)
    {

    }



//======================================================================================================================
//
//======================================================================================================================
    //public function (){
    //
    //}
}
