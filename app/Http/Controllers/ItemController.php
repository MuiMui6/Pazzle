<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemComment;
use App\Peas;
use App\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            ->where('users.name', 'like', '%' . $vkeyword . '%')
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
    public function additem()
    {

        $sizes = Size::get();

        $peases = Peas::get();

        return view('/admin/Register_Item', compact('sizes', 'peases'));
    }



//======================================================================================================================
//商品保存
//======================================================================================================================
    public function save(Request $request)
    {
        //DB処理
        $id = Item::insertGetId([
            'name' => $request->name,
            'profile' => $request->profile,
            'sizeid' => $request->sizeid,
            'peasid' => $request->peasid,
            'price' => $request->price,
            'view' => $request->view,
            'createrid' => $request->userid,
            'created_at' => now(),
            'updaterid' => $request->userid,
            'updated_at' => now()
        ]);



        if ($request->hasFile('img')) {
            $items = Item::FindOrFail($id);
            $request->validate(['img' => 'image']);
            //画像登録
            $imgname = now()->format('Ymd') . '.jpg';
            Storage::makeDirectory('public/items/' . $id);
            $request->file('img')->storeAs(
                'public/items/' . $id, $imgname);
            $items->image = $imgname;
            $items->save();
        }


        //一覧へ戻る処理
        $items = Item::join('users', 'users.id', '=', 'items.createrid')
            ->join('peases', 'peases.id', '=', 'items.peasid')
            ->join('sizes', 'sizes.id', '=', 'items.sizeid')
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
                'items.profile as profile',
                'items.price as price',
                'sizes.height as height',
                'sizes.width as width',
                'peases.cnt as cnt',
                'items.image as image',
                'items.view as view',
                'users.name as username',
                'items.created_at as created_at',
                'items.updated_at as updated_at'
            ])
            ->get();

        $sizes = Size::get();

        $peases = Peas::get();

        return view('/admin/Edit_Item', compact('items', 'sizes', 'peases'));

    }


//======================================================================================================================
//商品更新
//======================================================================================================================
    public function update(Request $request)
    {
        $items = Item::findOrFail($request->id);
        $chg = false;

        if ($request->hasFile('img')) {
            $request->validate(['img' => 'image']);
            //画像登録
            $imgname = now()->format('Ymd') . '.jpg';
            Storage::makeDirectory('public/items/' . $request->id);
            $request->file('img')->storeAs(
                'public/items/' . $request->id, $imgname);
            $items->image = $imgname;
            $chg = true;
        }


        if ($request->name <> null && $request->name <> $items->name) {
            $vname = $request->validate(['name' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/']);
            $vname = implode($vname);
            $items->name = $vname;
            $chg = true;
        }


        if ($request->profile <> null && $request->profile <> $items->profile) {
            $vprofile = $request->validate(['profile' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
            $vprofile = implode($vprofile);
            $items->profile = $vprofile;
            $chg = true;

        }


        if ($request->price <> null && $request->price <> $items->price) {
            $vprice = $request->validate(['price' => 'regex:/^[0-9]+$/']);
            $vprice = implode($vprice);
            $items->price = $vprice;
            $chg = true;

        }


        if ($request->sizeid <> "null" && $request->sizeid <> $items->sizeid) {
            $items->sizeid = $request->sizeid;
            $chg = true;

        }


        if ($request->peasid <> "null" && $request->peasid <> $items->peasid) {
            $items->peasid = $request->peasid;
            $chg = true;
        }


        if ($request->view <> $items->view) {
            $items->view = $request->view;
            $chg = true;
        }
        if ($chg == true) {
            $items->updated_at = now();
            $items->updaterid = $request->userid;
            $items->save();
        }


        $items = Item::join('users', 'users.id', '=', 'items.createrid')
            ->join('peases', 'peases.id', '=', 'items.peasid')
            ->join('sizes', 'sizes.id', '=', 'items.sizeid')
            ->where('items.id', $request->id)
            ->select([
                'items.id as id',
                'items.name as itemname',
                'items.profile as profile',
                'items.price as price',
                'sizes.height as height',
                'sizes.width as width',
                'peases.cnt as cnt',
                'items.image as image',
                'items.view as view',
                'users.name as username',
                'items.created_at as created_at',
                'items.updated_at as updated_at'
            ])
            ->get();

        $sizes = Size::get();

        $peases = Peas::get();
        return view('/admin/Edit_Item', compact('items', 'sizes', 'peases'));

    }



//======================================================================================================================
//
//======================================================================================================================
    //public function (){
    //
    //}
}
