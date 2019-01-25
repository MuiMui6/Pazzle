<?php

namespace App\Http\Controllers;

use App\ItemComment;
use App\Item;
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

        $comment = $request->validate(['comment' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
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


//======================================================================================
//
//======================================================================================
    public function search(Request $request)
    {
        $h_startday = null;
        $h_endday = null;
        $h_dateclumn = null;
        $searchclumn = $request->searchclumn;
        $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
        $vkeyword = implode($vkeyword);
        $h_keyword = $vkeyword;
        $h_clumn = $searchclumn;

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
            ->where($searchclumn, 'like', '%' . $vkeyword . '%')
            ->OrderBy('item_comments.created_at')
            ->paginate(10);

        return view('/admin/All_ItemComment', compact('ItemComments', 'h_keyword', 'h_clumn', 'h_startday', 'h_endday'));
    }


//======================================================================================
//
//======================================================================================
    public function datesearch(Request $request)
    {

        //初期値
        $h_keyword = null;
        $h_clumn = null;
        $startday = $request->startday;
        $h_startday = $startday;
        $endday = $request->endday;
        $h_endday = $endday;
        $conditions = $request->dateclumn;
        $h_dateclumn = $conditions;

        if ($endday == null || $endday >= now()) {
            $endday = now();
        }
        if ($startday == null || $startday > now()) {
            $startday = ItemComment::min($conditions);
        }


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
            ->whereBetWeen($conditions, [$startday, $endday])
            ->OrderBy('item_comments.created_at')
            ->paginate(10);

        return view('/admin/All_ItemComment', compact('ItemComments', 'h_keyword', 'h_clumn', 'h_startday', 'h_endday', 'h_dateclumn'));

    }




//======================================================================================
//
//======================================================================================
    public function viewedit(Request $request)
    {


        //検索ワード引継ぎ
        if ($request->h_keyword == null) {
            $h_keyword = null;
            $h_clumn = null;
        } else {
            $h_keyword = $request->h_keyword;
            $h_clumn = $request->h_clumn;
        }


        //日程検索引継ぎ
        $h_dateclumn = null;
        $h_startday = null;
        $h_endday = null;

        if ($request->dateclumn <> null) {

            $h_dateclumn = $request->h_dateclumn;

            if ($request->h_endday == null || $request->h_endday > now()) {
                $h_endday = now();
            }

            if ($request->h_startday == null || $request->h_startday > now()) {
                $h_startday = ItemComment::min($h_dateclumn);
            }
        }

        //viewの反転処理
        if ($request->view == 1) {
            $notview = 0;
        } else {
            $notview = 1;
        }

        ItemComment::where('id', $request->itemcommentid)
            ->update(['view' => $notview, 'updated_at' => now()]);


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
            ->OrderBy('item_comments.created_at')
            ->paginate(10);

        //データ引用
        if ($h_clumn <> null && $h_keyword <> null) {
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
                ->where($h_clumn, 'like', '%' . $h_keyword . '%')
                ->OrderBy('item_comments.created_at')
                ->paginate(10);

        } elseif ($h_startday <> null || $h_endday <> null) {
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
                ->whereBetween($h_dateclumn, [$h_startday . $h_endday])
                ->OrderBy('item_comments.created_at')
                ->paginate(10);
        }


        return view('/admin/All_ItemComment', compact('ItemComments', 'h_keyword', 'h_clumn', 'h_startday', 'h_endday', 'h_dateclumn'));
    }


//======================================================================================================================
//
//======================================================================================================================
    //public function (){
    //
    //}


}
