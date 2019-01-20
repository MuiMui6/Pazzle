<?php

namespace App\Http\Controllers;

use App\Spot;
use App\SpotComment;
use App\Tag;
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
            ->select('spots.spotid', 'spots.name as spotname', 'spots.profile', 'spots.tag1', 'spots.tag2', 'spots.tag3')
            ->where('spots.name', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.profile', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.tag1', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.tag2', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.tag3', 'like', '%' . $vkeyword . '%')
            ->orwhere('users.name', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.post', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.add1', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.add2', 'like', '%' . $vkeyword . '%')
            ->paginate(9);


        $tags = Tag::select('name')->get();

        return view('/SpotIndex', compact('tags', 'spots'));

    }

//===============================================================================
//
//===============================================================================
    public function detail(Request $request)
    {
        $spotid = $request->spotid;

        $tags = Tag::select('name')->get();

        $spots = Spot::join('users', 'users.id', '=', 'spots.createrid')
            ->join('tags', 'tags.tagid', '=', 'spots.tag1')
            ->where('spotid', $spotid)
            ->select('spots.spotid as spotid',
                'spots.name as spotname',
                'spots.profile',
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

        $tag1 = Tag::join('spots', 'tags.tagid', '=', 'spots.tag1')
            ->where('spots.spotid', $spotid)
            ->select('tags.name')
            ->get();

        $tag2 = Tag::join('spots', 'tags.tagid', '=', 'spots.tag2')
            ->where('spots.spotid', $spotid)
            ->select('tags.name')
            ->get();

        $tag3 = Tag::join('spots', 'tags.tagid', '=', 'spots.tag3')
            ->where('spots.spotid', $spotid)
            ->select('tags.name')
            ->get();

        $spotcomments = SpotComment::join('users', 'users.id', '=', 'spot_comments.userid')
            ->where('spotid', $spotid)
            ->select('spot_comments.evaluation', 'spot_comments.comment', 'spot_comments.view', 'users.name')
            ->get();

        $evaluation = SpotComment::where('spotid', $spotid)
            ->avg('evaluation');

        return view('/Detail_Spot', compact('tags', 'spots', 'tag1', 'tag2', 'tag3', 'spotcomments', 'evaluation', 'createrid'));
    }

//===============================================================================
//
//===============================================================================
    public function newspot(Request $request)
    {

        $tags = Tag::select('name')->get();

        $spots = null;

        return view('/Register_Spot', compact('tags', 'spots'));
    }


//===============================================================================
//
//===============================================================================
    public function editspot(Request $request)
    {

        $tags = Tag::select('name')->get();

        $spots = Spot::join('users', 'users.id', '=', 'spots.createrid')
            ->where('spotid', $request->spotid)
            ->select('spots.spotid as spotid',
                'spots.name as spotname',
                'spots.profile as profile',
                'spots.createrid as userid',
                'spots.post as post',
                'spots.add1 as add1',
                'spots.add2 as add2',
                'spots.url as url',
                'spots.tel as tel',
                'spots.tag1 as tag1',
                'spots.tag2 as tag2',
                'spots.tag3 as tag3',
                'spots.view as view')
            ->get();

        $tag1 = Tag::join('spots', 'tags.tagid', '=', 'spots.tag1')
            ->where('spots.spotid', $request->spotid)
            ->select('tags.name')
            ->get();

        $tag2 = Tag::join('spots', 'tags.tagid', '=', 'spots.tag2')
            ->where('spots.spotid', $request->spotid)
            ->select('tags.name')
            ->get();

        $tag3 = Tag::join('spots', 'tags.tagid', '=', 'spots.tag3')
            ->where('spots.spotid', $request->spotid)
            ->select('tags.name')
            ->get();

        return view('/Edit_Article', compact('tags', 'spots', 'tag1', 'tag2', 'tag3'));
    }


//===============================================================================
//
//===============================================================================
    public function save(Request $request)
    {

        //ヴァリデーション
        $vspot = $request->validate([
            'name' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠・]+$/',
            'profile' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠・!！＊]+$/',
            'userid' => 'regex:/^[0-9]+$/']);


        $spot = Spot::create([
            'name' => $vspot->name,
            'profile' => $vspot->profile,
            'post' => $vspot->post,
            'add1' => $vspot->add1,
            'add2' => $vspot->add2,
            'url' => $vspot->url,
            'tel' => $vspot->tel,
            'tag1' => $vspot->tag1,
            'tag2' => $vspot->tag2,
            'tag3' => $vspot->tag3,
            'createrid' => $vspot->userid,
        ])->get();

        $tags = Tag::select('name')->get();

        $spots = Spot::join('users', 'users.id', '=', 'spots.createrid')
            ->join('tags', 'tags.tagid', '=', 'spots.tag1')
            ->where('spotid', $spot->spotid)
            ->select('spots.spotid as spotid',
                'spots.name as spotname',
                'spots.profile',
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

        $tag1 = Tag::join('spots', 'tags.tagid', '=', 'spots.tag1')
            ->where('spots.spotid', $spot->spotid)
            ->select('tags.name')
            ->get();

        $tag2 = Tag::join('spots', 'tags.tagid', '=', 'spots.tag2')
            ->where('spots.spotid', $spot->spotid)
            ->select('tags.name')
            ->get();

        $tag3 = Tag::join('spots', 'tags.tagid', '=', 'spots.tag3')
            ->where('spots.spotid', $spot->spotid)
            ->select('tags.name')
            ->get();

        $spotcomments = SpotComment::join('users', 'users.id', '=', 'spot_comments.userid')
            ->where('spotid', $spot->spotid)
            ->select('spot_comments.evaluation', 'spot_comments.comment', 'spot_comments.view', 'users.name')
            ->get();

        $evaluation = SpotComment::where('spotid', $spot->spotid)
            ->avg('evaluation');

        return view('/Detail_Spot', compact('tags', 'spots', 'tag1', 'tag2', 'tag3', 'spotcomments', 'evaluation', 'createrid'));

    }


//===============================================================================
//
//===============================================================================
    public function update(Request $request)
    {

        $spotid = $request->spotid;


        //spotname
        if ($request->name <> Spot::select('name') && $request->name <> null) {
            $vspotname = $request->validate(['name' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠・]+$/']);
            $vspotname = implode($vspotname);
            Spot::where('spotid',$spotid)->update(['name'=>$vspotname]);
        }

        //profile
        if ($request->profile <> Spot::select('profile') && $request->profile <> null) {
            $vprofile = $request->validate(['profile' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠・]+$/']);
            $vprofile = implode($vprofile);
            Spot::where('spotid',$spotid)->update(['profile'=>$vprofile]);
        }

        //post
        if ($request->post <> Spot::select('post') && $request->post <> null) {
            $vpost = $request->validate(['post' => 'regex:/^[0-9]+$/']);
            $vpost = implode($vpost);
            Spot::where('spotid',$spotid)->update(['post'=>$vpost]);
        }

        //add1
        if ($request->add1 <> Spot::select('add1') && $request->add1 <> null) {
            $vadd1 = $request->validate(['add1' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠・]+$/']);
            $vadd1 = implode($vadd1);
            Spot::where('spotid',$spotid)->update(['add1'=>$vadd1]);
        }

        //add2
        if ($request->add2 <> Spot::select('add2') && $request->add2 <> null) {
            $vadd2 = $request->validate(['add2' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠・]+$/']);
            $vadd2 = implode($vadd2);
            Spot::where('spotid',$spotid)->update(['add2'=>$vadd2]);
        }

        //url
        if ($request->url <> Spot::select('url') && $request->url <> null) {
            $vurl = $request->validate(['url' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠・]+$/']);
            $vurl = implode($vurl);
            Spot::where('spotid',$spotid)->update(['url'=>$vurl]);
        }

        //tel
        if ($request->tel <> Spot::select('tel') && $request->tel <> null) {
            $vtel = $request->validate(['tel' => 'regex:/^[0-9]+$/']);
            $vtel = implode($vtel);
            Spot::where('spotid',$spotid)->update(['tel'=>$vtel]);
        }

        //tag1
        if ($request->tag1 <> Spot::select('tag1') && $request->tag1 <> null) {
            $vtag1 = $request->validate(['tag1' => 'regex:/^[0-9]+$/']);
            $vtag1 = implode($vtag1);
            Spot::where('spotid',$spotid)->update(['tag1'=>$vtag1]);

        }

        //tag2
        if ($request->tag2 <> Spot::select('tag2') && $request->tag2 <> null) {
            $vtag2 = $request->validate(['tag2' => 'regex:/^[0-9]+$/']);
            $vtag2 = implode($vtag2);
            Spot::where('spotid',$spotid)->update(['tag2'=>$vtag2]);
        }

        //tag3
        if ($request->tag3 <> Spot::select('tag3') && $request->tag3 <> null) {
            $vtag3 = $request->validate(['tag3' => 'regex:/^[0-9]+$/']);
            $vtag3 = implode($vtag3);
            Spot::where('spotid',$spotid)->update(['tag3'=>$vtag3]);
        }

        //view
        if ($request->view <> Spot::select('view') && $request->view <> null) {
            $vview = $request->validate(['view' => 'regex:/^[0-9]+$/']);
            $vview = implode($vview);
            Spot::where('spotid',$spotid)->update(['view'=>$vview]);
        }

        $tags = Tag::select('name')->get();

        $spots = Spot::join('users', 'users.id', '=', 'spots.createrid')
            ->join('tags', 'tags.tagid', '=', 'spots.tag1')
            ->where('spots.spotid', $spotid)
            ->select('spots.spotid as spotid',
                'spots.name as spotname',
                'spots.profile',
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

        $tag1 = Tag::join('spots', 'tags.tagid', '=', 'spots.tag1')
            ->where('spots.spotid', $spotid)
            ->select('tags.name')
            ->get();

        $tag2 = Tag::join('spots', 'tags.tagid', '=', 'spots.tag2')
            ->where('spots.spotid', $spotid)
            ->select('tags.name')
            ->get();

        $tag3 = Tag::join('spots', 'tags.tagid', '=', 'spots.tag3')
            ->where('spots.spotid', $spotid)
            ->select('tags.name')
            ->get();

        $spotcomments = SpotComment::join('users', 'users.id', '=', 'spot_comments.userid')
            ->where('spotid', $spotid)
            ->select('spot_comments.evaluation', 'spot_comments.comment', 'spot_comments.view', 'users.name')
            ->get();

        $evaluation = SpotComment::where('spotid', $spotid)
            ->avg('evaluation');

        return view('/Detail_Spot', compact('tags', 'spots', 'tag1', 'tag2', 'tag3', 'spotcomments', 'evaluation', 'createrid'));
    }


//===============================================================================
//
//===============================================================================
    //public function (){
    //
    //}
}
