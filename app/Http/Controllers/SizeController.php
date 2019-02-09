<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{

//======================================================================================================================
//Search
//======================================================================================================================
    public function adminview()
    {
        $message = null;

        $sizes = Size::join('users', 'users.id', '=', 'sizes.createrid')
            ->select([
                'sizes.id as id',
                'sizes.height as height',
                'sizes.width as width',
                'sizes.created_at as created_at',
                'sizes.updated_at as updated_at',
                'users.name as creatername'
            ])
            ->orderBy('sizes.id', '1')
            ->paginate(9);

        return view('/admin/All_Size', compact('sizes','message'));

    }

//======================================================================================================================
//Search
//======================================================================================================================
    public function search(Request $request)
    {
        if ($request->keyword <> null) {

            $message = null;
            $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
            $vkeyword = implode($vkeyword);

            $sizes = Size::join('users', 'users.id', '=', 'sizes.createrid')
                ->select([
                    'sizes.id as id',
                    'sizes.height as height',
                    'sizes.width as width',
                    'sizes.created_at as created_at',
                    'sizes.updated_at as updated_at',
                    'users.name as creatername'
                ])
                ->where($request->clumn, 'like', '%' . $vkeyword . '%')
                ->orderBy('sizes.id', '1')
                ->paginate(9);

            return view('/admin/All_Size', compact('sizes','message'));
        }


        return redirect('/admin/All_Size');

    }



//======================================================================================================================
//Create
//======================================================================================================================
    public function create(Request $request)
    {

        //高さ
        $vheight = $request->validate(['height' => 'regex:/^[0-9]+$/']);
        $vheight = implode($vheight);


        //横
        $vwidth = $request->validate(['width' => 'regex:/^[0-9]+$/']);
        $vwidth = implode($vwidth);

        $c_peas = Size::where('sizes.height', $vheight)
            ->where('sizes.width', $vwidth)
            ->count('id');

        if ($c_peas == '0') {

            Size::insert([
                'height' => $vheight,
                'width' => $vwidth,
                'createrid' => $request->userid,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $message = '作成しました';
        }else{
            $message = '既に作成されております';
        }

        $sizes = Size::join('users', 'users.id', '=', 'sizes.createrid')
            ->select([
                'sizes.id as id',
                'sizes.height as height',
                'sizes.width as width',
                'sizes.created_at as created_at',
                'sizes.updated_at as updated_at',
                'users.name as creatername'
            ])
            ->orderBy('sizes.id', '1')
            ->paginate(9);

        return view('/admin/All_Size', compact('sizes','message'));
    }


//======================================================================================================================
//
//======================================================================================================================
//public function (){
//
//}
}
