<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\ItemComment;
use App\Peas;
use App\Size;

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
        $item = DB::table('items')
            ->join('peases', 'items.peasid', '=', 'peases.id')
            ->join('sizes', 'items.sizeid', '=', 'sizes.id')
            ->select('items.id', 'items.name', 'items.profile', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
            ->orderBy('items.created_at','desc')
            ->paginate(9);

        //もしキーワードがあれば
        if ($keyword <> null) {
            $item = DB::table('items')
                ->join('peases', 'items.peasid', '=', 'peases.id')
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
            $item = DB::table('items')
                ->join('peases', 'items.peasid', '=', 'peases.id')
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


        $itemcomments = ItemComment::join('users','users.id','=','item_comments.userid')
            ->where('itemid',$request->itemid)
            ->where('item_comments.view','1')
            ->orderBy('item_comments.created_at','1')
            ->get();

        $evaluation = ItemComment::where('itemid',$request->itemid)
            ->avg('evaluation');

        return view('/Detail_Item', compact('item', 'peas', 'size', 'message','itemcomments','evaluation'));

    }




//======================================================================================================================
//
//======================================================================================================================
    //public function (){
    //
    //}
}
