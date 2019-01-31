<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class SizeController extends Controller
{

//======================================================================================================================
//Search
//======================================================================================================================
    public function adminview()
    {

        $sizes = Size::join('users', 'users.id', '=', 'sizes.createrid')
            ->select([
                'sizes.id as id',
                'sizes.height as height',
                'sizes.width as width',
                'sizes.created_at as created_at',
                'sizes.updated_at as updated_at',
                'users.name as creatername'
            ])
            ->orderBy('sizes.created_at', '1')
            ->paginate(9);

        return view('/admin/All_Size', compact('sizes'));

    }

//======================================================================================================================
//Search
//======================================================================================================================
    public function search(Request $request)
    {
        if ($request->keyword <> null) {

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
                ->orderBy('sizes.created_at', '1')
                ->paginate(9);

            return view('/admin/All_Size', compact('sizes'));
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
        }

        return redirect('/admin/All_Size');
    }


//======================================================================================================================
//
//======================================================================================================================
//public function (){
//
//}
}
