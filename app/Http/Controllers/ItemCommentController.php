<?php

namespace App\Http\Controllers;

use App\ItemComment;
use Illuminate\Http\Request;

class ItemCommentController extends Controller
{

    //
    public function view()
    {

        $h_keyword = null;
        $h_clumn = null;

        $ItemComments = ItemComment::join('users', 'users.id', '=', 'item_comments.userid')
            ->join('items', 'items.itemid', '=', 'item_comments.itemid')
            ->select(
                'item_comments.itemcommentid',
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
            ->paginate(15);

        return view('/admin/All_ItemComment', compact('ItemComments', 'h_keyword', 'h_clumn'));

    }

//======================================================================================
//
//======================================================================================
    public function search(Request $request)
    {
        $searchclumn = $request->searchclumn;
        $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
        $vkeyword = implode($vkeyword);
        $h_keyword = $vkeyword;
        $h_clumn = $searchclumn;

        $ItemComments = ItemComment::join('users', 'users.id', '=', 'item_comments.userid')
            ->join('items', 'items.itemid', '=', 'item_comments.itemid')
            ->select(
                'item_comments.itemcommentid',
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
            ->paginate(15);

        return view('/admin/All_ItemComment', compact('ItemComments', 'h_keyword', 'h_clumn'));
    }

//======================================================================================
//
//======================================================================================
    public function viewedit(Request $request)
    {
        if ($request->h_keyword == null) {
            $h_keyword = null;
            $h_clumn = null;
        } else {
            $h_keyword = $request->h_keyword;
            $h_clumn = $request->h_clumn;
        }

        if ($request->view == 1) {
            $notview = 0;
        } else {
            $notview = 1;
        }

        ItemComment::where('itemcommentid', $request->itemcommentid)
            ->update(['view' => $notview, 'updated_at' => now()]);


        $ItemComments = ItemComment::join('users', 'users.id', '=', 'item_comments.userid')
            ->join('items', 'items.itemid', '=', 'item_comments.itemid')
            ->select(
                'item_comments.itemcommentid',
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
            ->paginate(15);

        if ($h_keyword <> null) {

        }

        return view('/admin/All_ItemComment', compact('ItemComments', 'h_keyword', 'h_clumn'));
    }

//テンプレート
//======================================================================================
//
//======================================================================================
//public function (){
//
//}


}
