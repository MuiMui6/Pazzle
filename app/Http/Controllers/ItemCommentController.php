<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemComment;
use App\Peas;
use App\Size;
use Illuminate\Http\Request;

class ItemCommentController extends Controller
{

//======================================================================================================================
//
//======================================================================================================================
    public function postitemcomment(Request $request)
    {

        $comment = $request->validate(['comment' => 'regex:/^[a-zA-Z0-9ａ-ｚＡ-Ｚ０-９ぁ-んァ-ヶー一-龠！？・ー。、（）]+$/']);
        $comment = implode($comment);

        ItemComment::insert([
            'itemid' => $request->itemid,
            'userid' => $request->userid,
            'evaluation' => $request->evaluation,
            'comment' => $comment,
            'created_at' => now()
        ]);


        $message = null;

        //テーブル全取得
        $item = Item::join('peases', 'items.peasid', '=', 'peases.id')
            ->join('sizes', 'items.sizeid', '=', 'sizes.id')
            ->select('items.id', 'items.name', 'items.profile', 'items.price', 'peases.cnt', 'sizes.height', 'sizes.width')
            ->where('items.id',$request->itemid)
            ->OrderBy('items.id', '1')
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
            ->where('view', '1')
            ->avg('evaluation');


        return view('/Detail_Item', compact('item', 'peas', 'size', 'message', 'itemcomments', 'evaluation'));

    }



//======================================================================================================================
//
//======================================================================================================================
    public function view()
    {
        $message = null;
        $ItemComments = ItemComment::join('users', 'users.id', '=', 'item_comments.userid')
            ->join('items', 'items.id', '=', 'item_comments.itemid')
            ->select(
                'item_comments.id',
                'items.name as itemname',
                'item_comments.itemid as itemid',
                'item_comments.userid as userid',
                'users.name as username',
                'item_comments.evaluation',
                'item_comments.comment',
                'item_comments.view',
                'item_comments.updaterid',
                'item_comments.created_at',
                'item_comments.updated_at')
            ->OrderBy('item_comments.id', '1')
            ->paginate(10);

        return view('/admin/All_ItemComment',
            compact('ItemComments', 'message'));
    }


//======================================================================================
//
//======================================================================================
    public function search(Request $request)
    {
        $message = null;
        $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
        $vkeyword = implode($vkeyword);

        $ItemComments = ItemComment::join('users', 'users.id', '=', 'item_comments.userid')
            ->join('items', 'items.id', '=', 'item_comments.itemid')
            ->select(
                'item_comments.id',
                'items.name as itemname',
                'item_comments.itemid as itemid',
                'item_comments.userid as userid',
                'users.name as username',
                'item_comments.evaluation as evaluation',
                'item_comments.comment as comment',
                'item_comments.view',
                'item_comments.created_at as created_at',
                'item_comments.updated_at as updated_at')
            ->where($request->clumn, 'like', '%' . $vkeyword . '%')
            ->OrderBy('item_comments.id', '1')
            ->paginate(10);

        return view('/admin/All_ItemComment', compact('ItemComments', 'message'));
    }


//======================================================================================
//
//======================================================================================
    public function viewedit(Request $request)
    {

        //viewの反転処理
        if ($request->view == 1) {
            $notview = 0;
        } else {
            $notview = 1;
        }

        ItemComment::where('id', $request->itemcommentid)
            ->update(['view' => $notview, 'updaterid' => $request->userid, 'updated_at' => now()]);

        $message = '更新しました';

        $ItemComments = ItemComment::join('users', 'users.id', '=', 'item_comments.userid')
            ->join('items', 'items.id', '=', 'item_comments.itemid')
            ->select(
                'item_comments.id',
                'items.name as itemname',
                'item_comments.itemid as itemid',
                'item_comments.userid as userid',
                'users.name as username',
                'item_comments.evaluation',
                'item_comments.comment',
                'item_comments.view',
                'item_comments.updaterid',
                'item_comments.created_at',
                'item_comments.updated_at')
            ->OrderBy('item_comments.id','1')
            ->paginate(10);

        return view('/admin/All_ItemComment', compact('ItemComments', 'message'));
    }


//======================================================================================================================
//
//======================================================================================================================
    //public function (){
    //
    //}


}
