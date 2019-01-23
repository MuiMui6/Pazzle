<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{

//======================================================================================================================
//Search
//======================================================================================================================
    public function search(Request $request)
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

        $updatername = Size::join('users', 'users.id', '=', 'sizes.updaterid')
            ->distinct('users.name')->get();

        if ($request->keyword <> null) {

            $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
            $vkeyword = implode($vkeyword);

            $sizes = Size::join('users', 'users.id', '=', 'sizes.createrid')
                ->where('sizes.height', 'like', '%' . $vkeyword . '%')
                ->where('sizes.width', 'like', '%' . $vkeyword . '%')
                ->orwhere('users.name', 'like' . '%' . $vkeyword . '%')
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

            $updatername = Size::join('users', 'users.id', '=', 'sizes.updaterid')
                ->distinct('users.name')->get();
        }


        return view('/admin/All_Size', compact('sizes', 'updatername'));

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
//Update
//======================================================================================================================
    public function update(Request $request)
    {
        $vwidth = null;
        $vheight = null;

        if ($request->height <> null) {
            //高さ
            $vheight = $request->validate(['height' => 'regex:/^[0-9]+$/']);
            $vheight = implode($vheight);
        }

        if ($request->width <> null) {
            //横
            $vwidth = $request->validate(['width' => 'regex:/^[0-9]+$/']);
            $vwidth = implode($vwidth);
        }

        $c_peas = Size::where('sizes.height', $vheight)
            ->where('sizes.width', $vwidth)
            ->count('id');

        if ($c_peas == '0') {
            if ($vwidth <> null && $vheight <> null) {

                Size::where('id', $request->id)
                    ->update([
                        'height' => $vheight,
                        'width' => $vwidth,
                        'updaterid' => $request->userid,
                        'updated_at' => now()
                    ]);

            } elseif ($vwidth == null && $vheight <> null) {

                Size::where('id', $request->id)
                    ->update([
                        'height' => $vheight,
                        'updaterid' => $request->userid,
                        'updated_at' => now()
                    ]);

            } elseif ($vwidth <> null && $vheight == null) {

                Size::where('id', $request->id)
                    ->update([
                        'width' => $vwidth,
                        'updaterid' => $request->userid,
                        'updated_at' => now()
                    ]);

            }
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
