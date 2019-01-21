<?php

namespace App\Http\Controllers;

use App\Spot;
use App\SpotComment;
use Illuminate\Http\Request;

class SpotController extends Controller
{

//テンプレート
//===============================================================================
//
//===============================================================================
    public function search(Request $request)
    {

        $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
        $vkeyword = implode($vkeyword);

        $spots = Spot::join('users', 'users.id', '=', 'spots.createrid')
            ->select('spots.id as id', 'spots.name as spotname', 'spots.article')
            ->where('spots.name', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.article', 'like', '%' . $vkeyword . '%')
            ->orwhere('users.name', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.post', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.add1', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.add2', 'like', '%' . $vkeyword . '%')
            ->paginate(9);

        return view('/SpotIndex', compact('spots'));

    }

//===============================================================================
//
//===============================================================================
    public function detail(Request $request)
    {
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
                'spots.createrid',
                'spots.created_at',
                'spots.updated_at')
            ->get();

        $spotcomments = SpotComment::join('users', 'users.id', '=', 'spot_comments.userid')
            ->where('spotid', $spotid)
            ->select('spot_comments.evaluation', 'spot_comments.comment', 'spot_comments.view', 'users.name')
            ->get();

        $evaluation = SpotComment::where('spotid', $spotid)
            ->avg('evaluation');

        return view('/Detail_Article', compact('spots', 'spotcomments', 'evaluation', 'createrid'));
    }

//===============================================================================
//
//===============================================================================
    public function newspot()
    {
        return view('/Register_Article');
    }


//===============================================================================
//
//===============================================================================
    public function editspot(Request $request)
    {

        $spots = Spot::join('users', 'users.id', '=', 'spots.createrid')
            ->where('spots.id', $request->spotid)
            ->select('spots.id as id',
                'spots.name as spotname',
                'spots.article as article',
                'spots.createrid as userid',
                'spots.post as post',
                'spots.add1 as add1',
                'spots.add2 as add2',
                'spots.url as url',
                'spots.tel as tel',
                'spots.view as view')
            ->get();

        return view('/Edit_Article', compact('spots'));
    }


//===============================================================================
//
//===============================================================================
    public function save(Request $request)
    {

        //検査
        //image

        //spotname
        $vname = $request->validate(['name' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
        $vname = implode($vname);


        //Article
        $varticle = $request->validate(['article' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠＊！？・ー]+$/']);
        $varticle = implode($varticle);

        //登録
        Spot::insert([
            'name' => $vname,
            'article' => $varticle,
            'createrid' => $request->userid,
            'created_at' => now()
        ]);

        $spots = Spot::where('createrid',$request->userid)->paginate(10);

        return view('/All_Article', compact('spots'));
    }


//===============================================================================
//
//===============================================================================
    public function update(Request $request)
    {
        $spotid = $request->spotid;
        $spots = Spot::findOrFail($spotid);
        $chg = false;

        //image

        //spotname
        if ($request->name <> $spots->name && $request->name <> null) {
            $vname = $request->validate(['name' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
            $vname = implode($vname);
            $spots->name = $vname;
            $chg = true;
        }

        //Article
        if ($request->article <> $spots->article && $request->article <> null) {
            $varticle = $request->validate(['article' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠＊！？・ー]+$/']);
            $varticle = implode($varticle);
            $spots->name = $varticle;
            $chg = true;
        }

        //address_post
        if ($request->post <> $spots->post && $request->post <> null) {
            $vpost = $request->validate(['post' => 'regex:/^[0-9]+$/']);
            $vpost = implode($vpost);
            $spots->post = $vpost;
            $chg = true;
        }

        //address_add1
        if ($request->add1 <> $spots->add1 && $request->add1 <> null) {
            $vadd1 = $request->validate(['add1' => 'regex:/^[０-９ぁ-んァ-ヶー一-龠]+$/']);
            $vadd1 = implode($vadd1);
            $spots->add1 = $vadd1;
            $chg = true;
        }

        //address_add2
        if ($request->add2 <> $spots->add2 && $request->add2 <> null) {
            $vadd2 = $request->validate(['add2' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
            $vadd2 = implode($vadd2);
            $spots->add2 = $vadd2;
            $chg = true;
        }

        //url
        if ($request->url <> $spots->url && $request->url <> null) {
            $vurl = $request->validate(['url' => 'regex:/^[a-zA-Z0-9:/.]+$/']);
            $vurl = implode($vurl);
            $spots->name = $vurl;
            $chg = true;
        }


        //tel
        if ($request->tel <> $spots->tel && $request->tel <> null) {
            $vtel = $request->validate(['tel' => 'regex:/^[0-9]+$/']);
            $vtel = implode($vtel);
            $spots->tel = $vtel;
            $chg = true;
        }

        //view
        if ($request->view <> $spots->view && $request->view <> null) {
            if ($request->view == '1') {
                $spots->view = '0';
            } else {
                $spots->view = '1';
            }
            $chg = true;
        }


        if ($chg == true) {
            $spots->save();
        }

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
                'spots.createrid',
                'spots.created_at',
                'spots.updated_at')
            ->get();

        $spotcomments = SpotComment::join('users', 'users.id', '=', 'spot_comments.userid')
            ->where('spotid', $spotid)
            ->select('spot_comments.evaluation', 'spot_comments.comment', 'spot_comments.view', 'users.name')
            ->get();

        $evaluation = SpotComment::where('spotid', $spotid)
            ->avg('evaluation');

        return view('/Detail_Article', compact('spots', 'spotcomments', 'evaluation', 'createrid'));
    }


//===============================================================================
//
//===============================================================================
    //public function (){
    //
    //}
}
