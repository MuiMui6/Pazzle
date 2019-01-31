<?php

namespace App\Http\Controllers;

use App\Spot;
use App\SpotComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            ->select('spots.id as id', 'spots.name as spotname', 'spots.image', 'spots.article', 'spots.image as image')
            ->where('spots.name', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.article', 'like', '%' . $vkeyword . '%')
            ->orwhere('users.name', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.post', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.add1', 'like', '%' . $vkeyword . '%')
            ->orwhere('spots.add2', 'like', '%' . $vkeyword . '%')
            ->where('spots.view', '1')
            ->orderBy('spots.created_at', '1')
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
                'spots.image as image',
                'spots.createrid',
                'spots.created_at as created_at',
                'spots.updated_at as updated_at')
            ->get();

        $spotcomments = SpotComment::join('users', 'users.id', '=', 'spot_comments.userid')
            ->where('spotid', $spotid)
            ->where('view', '1')
            ->select('spot_comments.evaluation', 'spot_comments.comment', 'spot_comments.view', 'users.name')
            ->get();

        $evaluation = SpotComment::where('spotid', $spotid)
            ->where('view','1')
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
                'spots.image as image',
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
        $vspot = $request->validate([
            'name' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠]+$/',
            'article' => 'regex:/^[a-zA-Z0-9ａ-ｚA-Z０-９ぁ-んァ-ヶー一-龠＊！？・ー]+$/']);

        //登録
        $id = Spot::insertGetId([
            'name' => $request->name,
            'article' => $request->article,
            'post' => $request->post,
            'add1' => $request->add1,
            'add2' => $request->add2,
            'url' => $request->url,
            'tel' => $request->tel,
            'createrid' => $request->userid,
            'created_at' => now(),
            'updaterid' => $request->userid,
            'updated_at' => now()
        ]);

        if ($request->hasFile('img')) {
            $spots = Spot::FindOrFail($id);
            $request->validate(['img' => 'image']);
            //画像登録
            $imgname = now()->format('Ymd') . '.jpg';
            Storage::makeDirectory('public/spots/' . $id);
            $request->file('img')->storeAs(
                'public/spots/' . $id, $imgname);
            $spots->image = $imgname;
            $spots->save();
        }

        $spots = Spot::where('createrid', $request->userid)
            ->orderBy('created_at', '1')
            ->paginate(10);


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
        if ($request->hasFile('img')) {
            $spots = Spot::FindOrFail($spotid);
            $request->validate(['img' => 'image']);
            //画像登録
            $imgname = now()->format('Ymd') . '.jpg';
            Storage::makeDirectory('public/spots/' . $spotid);
            $request->file('img')->storeAs(
                'public/spots/' . $spotid, $imgname);
            $spots->image = $imgname;
            $spots->save();
        }
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
            $spots->view = $request->view;
            $chg = true;
        }


        if ($chg == true) {
            $spots->updated_at = now();
            $spots->updaterid = $request->userid;
            $spots->save();
        }

        $spots = Spot::where('createrid', $request->userid)
            ->orderBy('created_at', '1')
            ->paginate(10);

        return view('/All_Article', compact('spots'));
    }


//===============================================================================
//
//===============================================================================
    public function userarticle(Request $request)
    {

        $spots = Spot::where('createrid', $request->userid)
            ->orderBy('created_at', '1')
            ->paginate(10);


        return view('/All_Article', compact('spots'));
    }


//===============================================================================
//
//===============================================================================
    public function adminview()
    {
        $spots = Spot::join('users', 'users.id', '=', 'spots.createrid')
            ->select('spots.id as id',
                'spots.name as name',
                'spots.article as article',
                'spots.post as post',
                'spots.add1 as add1',
                'spots.add2 as add2',
                'spots.view as view',
                'spots.url as url',
                'spots.tel as tel',
                'users.name as creater',
                'spots.created_at as created_at',
                'spots.updated_at as updated_at'
            )
            ->orderBy('spots.created_at', '1')
            ->paginate(10);

        return view('/admin/All_Spot', compact('spots'));
    }


//===============================================================================
//
//===============================================================================
    public function adminsearch(Request $request)
    {
        if ($request->keyword) {

            $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Zａ-ｚＡ-Ｚ０-９ぁ-んァ-ヶー一-龠]+$/']);
            $vkeyword = implode($vkeyword);

            if ($request->clumn == 'creater') {

                $spots = Spot::join('users', 'users.id', '=', 'spots.createrid')
                    ->select('spots.id as id',
                        'spots.name as name',
                        'spots.article as article',
                        'spots.post as post',
                        'spots.add1 as add1',
                        'spots.add2 as add2',
                        'spots.view as view',
                        'spots.url as url',
                        'spots.tel as tel',
                        'users.name as creater',
                        'spots.created_at as created_at',
                        'spots.updated_at as updated_at'
                    )
                    ->where('users.name', 'like', '%' . $vkeyword . '%')
                    ->orderBy('spots.created_at', '1')
                    ->paginate(10);

            } else {

                $spots = Spot::join('users', 'users.id', '=', 'spots.createrid')
                    ->select('spots.id as id',
                        'spots.name as name',
                        'spots.article as article',
                        'spots.post as post',
                        'spots.add1 as add1',
                        'spots.add2 as add2',
                        'spots.view as view',
                        'spots.url as url',
                        'spots.tel as tel',
                        'users.name as creater',
                        'spots.created_at as created_at',
                        'spots.updated_at as updated_at'
                    )
                    ->where('spots' . $request->clumn, 'like', '%' . $vkeyword . '%')
                    ->orderBy('spots.created_at', '1')
                    ->paginate(10);

            }

            return view('/admin/All_Spot', compact('spots'));
        }

        return redirect('/admin/All_Spot');

    }







//===============================================================================
//
//===============================================================================
    //public function (){
    //
    //}
}
