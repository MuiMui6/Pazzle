<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\Peas;
use App\Size;
use App\Tag;

class ItemController extends Controller
{
//表示
//一般ユーザ
    public function user_view()
    {
        //テーブル全取得
        $item = DB::table('items')
            ->join('peases','items.sizeid','=','peases.peasid')
            ->join('sizes','items.sizeid','=','sizes.sizeid')
            ->select('items.itemid','items.name','items.profile','peases.cnt','sizes.height','sizes.width')
            ->Get();

        //ピース数
        $peas = Peas::select('cnt')->Get();

        //サイズ
        $size = Size::select('height', 'width') ->Get();

        //タグ
        $tag = Tag::select('name')->Get();

        return view('/home', compact('item','peas','size','tag'));
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

        //テーブル全取得
        $item = DB::table('items')
            ->join('peases','items.sizeid','=','peases.peasid')
            ->join('sizes','items.sizeid','=','sizes.sizeid')
            ->where('items.itemid',$request->itemid)
            ->select('items.itemid','items.name','items.profile','peases.cnt','sizes.height','sizes.width')
            ->Get();

        //ピース数
        $peas = Peas::select('cnt')->Get();

        //サイズ
        $size = Size::select('height', 'width') ->Get();

        //タグ
        $tag = Tag::select('name')->Get();

        return view('/Detail_Item', compact('item','peas','size','tag'));
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
