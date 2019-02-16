<?php

namespace App\Http\Controllers;

use App\Spot;
use App\SpotComment;
use Illuminate\Http\Request;

class SpotCommentController extends Controller
{

//===============================================================================
//観光地コメント
//===============================================================================
    public function PostSpotComment(Request $request)
    {
        $comment = $request->validate(['comment' => 'required|max:255|regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠！？]+$/']);
        $comment = implode($comment);

        SpotComment::insert([
            'spotid' => $request->spotid,
            'userid' => $request->userid,
            'evaluation' => $request->evaluation,
            'comment' => $comment,
            'created_at' => now()
        ]);


        $spotid = $request->spotid;

        $spots = Spot::join('users', 'users.id', '=', 'spots.createrid')
            ->where('spots.id', $spotid)
            ->select('spots.id as id',
                'spots.name as spotname',
                'spots.article',
                'spots.url',
                'spots.tel',
                'users.name as creatername',
                'spots.post',
                'spots.add1',
                'spots.add2',
                'spots.image as image',
                'spots.createrid',
                'spots.created_at',
                'spots.updated_at')
            ->get();

        $spotcomments = SpotComment::join('users', 'users.id', '=', 'spot_comments.userid')
            ->where('spotid', $spotid)
            ->select('spot_comments.evaluation', 'spot_comments.comment', 'spot_comments.view', 'users.name')
            ->OrderBy('spot_comments.id', '1')
            ->get();

        $evaluation = SpotComment::where('spotid', $spotid)
            ->where('view', '1')
            ->avg('evaluation');


        //タグ
        $tag = Tag::select('name')->where('genre', '2')->orwhere('genre', '3')->get();

        return view('/Detail_Article', compact('spots', 'spotcomments', 'evaluation', 'createrid','tag'));


    }
//===============================================================================
//管理者側一覧
//===============================================================================
    public function adminview()
    {
        $message = null;
        $spotcomments = SpotComment::join('users', 'users.id', '=', 'spot_comments.userid')
            ->join('spots', 'spots.id', '=', 'spot_comments.spotid')
            ->select('spot_comments.id as id',
                'spot_comments.comment as comment',
                'spot_comments.evaluation as evaluation',
                'spot_comments.view as view',
                'spot_comments.created_at as created_at',
                'spot_comments.updated_at as updated_at',
                'users.name as name',
                'spots.name as spotname'
            )
            ->orderBy('spot_comments.id', '1')
            ->paginate(10);

        return view('/admin/All_SpotComment', compact('spotcomments', 'message'));
    }


//===============================================================================
//管理者側一覧
//===============================================================================
    public function search(Request $request)
    {
        $message = null;
        $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
        $vkeyword = implode($vkeyword);

        if ($request->clumn == 'username') {
            $spotcomments = SpotComment::join('users', 'users.id', '=', 'spot_comments.userid')
                ->join('spots', 'spots.id', '=', 'spot_comments.spotid')
                ->where('users.name', 'like', '%' . $vkeyword . '%')
                ->select('spot_comments.id as id',
                    'spot_comments.comment as comment',
                    'spot_comments.evaluation as evaluation',
                    'spot_comments.view as view',
                    'spot_comments.created_at as created_at',
                    'spot_comments.updated_at as updated_at',
                    'users.name as name',
                    'spots.name as spotname'
                )
                ->orderBy('spot_comments.id', '1')
                ->paginate(10);

        } elseif ($request->clumn == 'spotname') {

            $spotcomments = SpotComment::join('users', 'users.id', '=', 'spot_comments.userid')
                ->join('spots', 'spots.id', '=', 'spot_comments.spotid')
                ->where('spots.name', 'like', '%' . $vkeyword . '%')
                ->select('spot_comments.id as id',
                    'spot_comments.comment as comment',
                    'spot_comments.evaluation as evaluation',
                    'spot_comments.view as view',
                    'spot_comments.created_at as created_at',
                    'spot_comments.updated_at as updated_at',
                    'users.name as name',
                    'spots.name as spotname'
                )
                ->orderBy('spot_comments.id', '1')
                ->paginate(10);

        } else {

            $spotcomments = SpotComment::join('users', 'users.id', '=', 'spot_comments.userid')
                ->join('spots', 'spots.id', '=', 'spot_comments.spotid')
                ->where('spot_comments.' . $request->clumn, 'like', '%' . $vkeyword . '%')
                ->select('spot_comments.id as id',
                    'spot_comments.comment as comment',
                    'spot_comments.evaluation as evaluation',
                    'spot_comments.view as view',
                    'spot_comments.created_at as created_at',
                    'spot_comments.updated_at as updated_at',
                    'users.name as name',
                    'spots.name as spotname'
                )
                ->orderBy('spot_comments.id', '1')
                ->paginate(10);
        }

        return view('/admin/All_SpotComment', compact('spotcomments','message'));
    }


//===============================================================================
//管理者側Viewの変更
//===============================================================================
    public function viewedit(Request $request)
    {

        if ($request->view == 0) {
            SpotComment::where('id', $request->id)
                ->update(['view' => '1', 'updated_at' => now(), 'updaterid' => $request->userid]);
        } else {
            SpotComment::where('id', $request->id)
                ->update(['view' => '0', 'updated_at' => now(), 'updaterid' => $request->userid]);
        }

        $message = '更新しました';

        $spotcomments = SpotComment::join('users', 'users.id', '=', 'spot_comments.userid')
            ->join('spots', 'spots.id', '=', 'spot_comments.spotid')
            ->select('spot_comments.id as id',
                'spot_comments.comment as comment',
                'spot_comments.evaluation as evaluation',
                'spot_comments.view as view',
                'spot_comments.created_at as created_at',
                'spot_comments.updated_at as updated_at',
                'users.name as name',
                'spots.name as spotname'
            )
            ->orderBy('spot_comments.id', '1')
            ->paginate(10);

        return view('/admin/All_SpotComment', compact('spotcomments','message'));

    }

//===============================================================================
//
//===============================================================================
    //public function (){
    //
    //}
}
