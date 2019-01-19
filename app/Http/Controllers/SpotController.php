<?php

namespace App\Http\Controllers;

use App\Spot;
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

        $spots = Spot::select('spotid', 'name', 'profile', 'tag1', 'tag2', 'tag3')
            ->where('name', 'like', '%' . $vkeyword . '%')
            ->orwhere('profile', 'like', '%' . $vkeyword . '%')
            ->orwhere('tag1', 'like', '%' . $vkeyword . '%')
            ->orwhere('tag2', 'like', '%' . $vkeyword . '%')
            ->orwhere('tag3', 'like', '%' . $vkeyword . '%')
            ->get();


        $tags = Tag::select('name')->get();

        return view('/SpotIndex', compact('tags', 'spots'));

    }

//===============================================================================
//
//===============================================================================
    public function view()
    {
        $tags = Tag::select('name')->get();
        $spots = Spot::select('spotid', 'name', 'profile', 'tag1', 'tag2', 'tag3')->get();

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
            ->select('spots.name as spotname',
                'spots.profile',
                'spots.url',
                'spots.tel',
                'users.name as creatername',
                'spots.post',
                'spots.add1',
                'spots.add2',
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


        return view('/Detail_Spot', compact('tags', 'spots', 'tag1', 'tag2', 'tag3'));
    }

//===============================================================================
//
//===============================================================================
    public function newspot(Request $request)
    {


        return view('/Edit_Article', compact());
    }


//===============================================================================
//
//===============================================================================
    public function editspot(Request $request)
    {

        return view('/Edit_Article', compact());
    }


//===============================================================================
//
//===============================================================================
    public function save(Request $request)
    {

        return view('/Edit_Article', compact());
    }


//===============================================================================
//
//===============================================================================
    //public function (){
    //
    //}
}
