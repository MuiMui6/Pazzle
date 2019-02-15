<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemComment;
use App\Peas;
use App\Size;
use App\Tag;
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
        $key_peas = $request->key_peas;
        $key_tag = $request->key_tag;

        //テーブル全取得
        $item = Item::join('peases', 'items.peasid', '=', 'peases.id')
            ->join('sizes', 'items.sizeid', '=', 'sizes.id')
            ->select('items.id', 'items.name', 'items.image', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
            ->where('items.view', '=', '1')
            ->orderBy('items.id', '1')
            ->paginate(15);

        //もしキーワードがあれば
        if ($keyword <> null) {
            $item = Item::join('peases', 'items.peasid', '=', 'peases.id')
                ->join('sizes', 'items.sizeid', '=', 'sizes.id')
                ->select('items.id', 'items.name', 'items.image', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
                ->orwhere('items.name', 'like', '%' . $keyword . '%')
                ->orwhere('items.tag1', 'like', '%' . $keyword . '%')
                ->orwhere('items.tag2', 'like', '%' . $keyword . '%')
                ->orwhere('items.tag3', 'like', '%' . $keyword . '%')
                ->orwhere('items.profile', 'like', '%' . $keyword . '%')
                ->orwhere('items.price', 'like', '%' . $keyword . '%')
                ->where('items.view', '=', '1')
                ->orderBy('items.id', '1')
                ->paginate(15);
        }

        //もしサイズ指定があれば
        if ($key_height <> null && $key_width <> null) {
            $item = Item::join('peases', 'items.peasid', '=', 'peases.id')
                ->join('sizes', 'items.sizeid', '=', 'sizes.id')
                ->select('items.id', 'items.name', 'items.image', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
                ->where('sizes.height', $key_height)
                ->where('sizes.width', $key_width)
                ->where('items.view', '=', '1')
                ->orderBy('items.id', '1')
                ->paginate(15);
        }

        if ($key_peas <> null) {
            $item = Item::join('peases', 'items.peasid', '=', 'peases.id')
                ->join('sizes', 'items.sizeid', '=', 'sizes.id')
                ->select('items.id', 'items.name', 'items.image', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
                ->where('peases.cnt', $key_peas)
                ->where('items.view', '=', '1')
                ->orderBy('items.id', '1')
                ->paginate(15);
        }

        if ($key_tag <> null) {
            $item = Item::join('peases', 'items.peasid', '=', 'peases.id')
                ->join('sizes', 'items.sizeid', '=', 'sizes.id')
                ->select('items.id', 'items.name', 'items.image', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
                ->orwhere('items.tag1', '%' . $key_tag . '%')
                ->orwhere('items.tag2', '%' . $key_tag . '%')
                ->orwhere('items.tag3', '%' . $key_tag . '%')
                ->where('items.view', '=', '1')
                ->orderBy('items.id', '1')
                ->paginate(15);
        }

        //ピース数
        $peas = Peas::select('cnt')->Get();

        //サイズ
        $size = Size::select('height', 'width')->Get();

        //タグ
        $tag = Tag::select('name')->where('genre', '1')->orwhere('genre', '3')->get();

        return view('/home', compact('item', 'peas', 'size', 'tag'));
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
            ->select(
                'items.id',
                'items.name',
                'items.profile',
                'items.image',
                'items.price',
                'peases.cnt',
                'items.tag1 as tag1',
                'items.tag2 as tag2',
                'items.tag3 as tag3',
                'sizes.height',
                'sizes.width')
            ->where('items.id', $request->itemid)
            ->Get();

        //ピース数
        $peas = Peas::select('cnt')->get();

        //サイズ
        $size = Size::select('height', 'width')->get();

        //タグ
        $tag = Tag::select('name')->where('genre', '1')->orwhere('genre', '3')->get();


        $itemcomments = ItemComment::join('users', 'users.id', '=', 'item_comments.userid')
            ->where('itemid', $request->itemid)
            ->where('item_comments.view', '1')
            ->orderBy('item_comments.created_at', '1')
            ->get();

        $evaluation = ItemComment::where('itemid', $request->itemid)
            ->where('view', '1')
            ->avg('evaluation');

        return view('/Detail_Item', compact('item', 'peas', 'size', 'message', 'itemcomments', 'evaluation','tag'));

    }


//======================================================================================================================
//管理者商品一覧
//======================================================================================================================
    public function adminview()
    {

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
                'items.image',
                'items.created_at as created_at',
                'items.updated_at as updated_at'
            ])
            ->OrderBy('items.id', '1')
            ->paginate(10);

        $message = null;

        return view('/admin/All_Item', compact('items', 'message'));
    }


//======================================================================================================================
//管理者商品一覧
//======================================================================================================================
    public function search(Request $request)
    {

        $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
        $vkeyword = implode($vkeyword);

        $message = null;

        if ($request->clumn == 'tag') {
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
                    'items.tag1 as tag1',
                    'items.tag2 as tag2',
                    'items.tag3 as tag3',
                    'items.view as view',
                    'items.image',
                    'items.created_at as created_at',
                    'items.updated_at as updated_at'
                ])
                ->orwhere('items.tag1', 'like', '%' . $vkeyword . '%')
                ->orwhere('items.tag2', 'like', '%' . $vkeyword . '%')
                ->orwhere('items.tag3', 'like', '%' . $vkeyword . '%')
                ->OrderBy('items.id', '1')
                ->paginate(10);

        } elseif ($request->clumn == 'itemname') {

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
                    'items.tag1 as tag1',
                    'items.tag2 as tag2',
                    'items.tag3 as tag3',
                    'items.image',
                    'items.created_at as created_at',
                    'items.updated_at as updated_at'
                ])
                ->orwhere('items.name', 'like', '%' . $vkeyword . '%')
                ->OrderBy('items.id', '1')
                ->paginate(10);
        } else {
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
                    'items.tag1 as tag1',
                    'items.tag2 as tag2',
                    'items.tag3 as tag3',
                    'items.image',
                    'items.created_at as created_at',
                    'items.updated_at as updated_at'
                ])
                ->where($request->clumn, 'like', '%' . $vkeyword . '%')
                ->OrderBy('items.id', '1')
                ->paginate(10);
        }

        return view('/admin/All_Item', compact('items', 'message'));
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
        $request->validate([
            'name' => 'max:30|regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠]+$/',
            'profile' => 'max:255|regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠！？・（）―～]+$/',
            'price' => 'max:10|regex:/^[0-9]+$/',
            'tag1' => 'nullable|max:30|regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠]+$/',
            'tag2' => 'nullable|max:30|regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠]+$/',
            'tag3' => 'nullable|max:30|regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠]+$/'
        ]);

        //DB処理
        $id = Item::insertGetId([
            'name' => $request->name,
            'profile' => $request->profile,
            'sizeid' => $request->sizeid,
            'peasid' => $request->peasid,
            'price' => $request->price,
            'tag1' => $request->tag1,
            'tag2' => $request->tag2,
            'tag3' => $request->tag3,
            'view' => $request->view,
            'createrid' => $request->userid,
            'created_at' => now(),
            'updaterid' => $request->userid,
            'updated_at' => now()
        ]);

        $message = '追加しました';

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
                'items.image',
                'items.created_at as created_at',
                'items.updated_at as updated_at'
            ])
            ->OrderBy('items.id', '1')
            ->paginate(10);

        return view('/admin/All_Item', compact('items', 'message'));

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
                'items.tag1 as tag1',
                'items.tag2 as tag2',
                'items.tag3 as tag3',
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
        $message = null;

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
            $vname = $request->validate(['name' => 'max:30|regex:/^[a-zA-Z0-9ａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/']);
            $vname = implode($vname);
            $items->name = $vname;
            $chg = true;
        }


        if ($request->profile <> null && $request->profile <> $items->profile) {
            $vprofile = $request->validate(['profile' => 'max:255|regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
            $vprofile = implode($vprofile);
            $items->profile = $vprofile;
            $chg = true;

        }


        if ($request->price <> null && $request->price <> $items->price) {
            $vprice = $request->validate(['price' => 'max:10|regex:/^[0-9]+$/']);
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


        if ($request->tag1 <> null && $request->tag1 <> $items->tag1) {
            $vtag = $request->validate(['tag1' => 'max:30|regex:/^[a-zA-Z0-9ａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/']);
            $vtag = implode($vtag);
            $items->tag1 = $vtag;
            $chg = true;
        }


        if ($request->tag2 <> null && $request->tag2 <> $items->tag2) {
            $vtag = $request->validate(['tag2' => 'max:30|regex:/^[a-zA-Z0-9ａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/']);
            $vtag = implode($vtag);
            $items->tag2 = $vtag;
            $chg = true;
        }

        if ($request->tag3 <> null && $request->tag3 <> $items->tag3) {
            $vtag = $request->validate(['tag3' => 'max:30|regex:/^[a-zA-Z0-9ａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/']);
            $vtag = implode($vtag);
            $items->tag3 = $vtag;
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
            $message = '更新しました';
        }


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
                'items.image',
                'items.created_at as created_at',
                'items.updated_at as updated_at'
            ])
            ->OrderBy('items.id', '1')
            ->paginate(10);

        return view('/admin/All_Item', compact('items', 'message'));

    }



//======================================================================================================================
//
//======================================================================================================================
    //public function (){
    //
    //}
}
