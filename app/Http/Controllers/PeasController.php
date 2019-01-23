<?php

namespace App\Http\Controllers;

use App\Peas;
use Illuminate\Http\Request;

class PeasController extends Controller
{

//======================================================================================================================
//Search
//======================================================================================================================
    public function search(Request $request)
    {

        $peases = Peas::join('users', 'users.id', '=', 'peases.createrid')
            ->select([
                'peases.id as id',
                'peases.cnt as cnt',
                'peases.created_at as created_at',
                'peases.updated_at as updated_at',
                'users.name as creatername'
            ])
            ->orderBy('peases.created_at', '1')
            ->paginate(9);

        $updatername = Peas::join('users', 'users.id', '=', 'peases.updaterid')
            ->select('users.name')->get();

        if ($request->keyword <> null) {

            $vkeyword = $request->validate(['keyword' => 'regex:/^[0-9a-zA-Z０-９ぁ-んァ-ヶー一-龠]+$/']);
            $vkeyword = implode($vkeyword);

            $peases = Peas::join('users', 'users.id', '=', 'peases.createrid')
                ->where('peases.cnt', 'like', '%' . $vkeyword . '%')
                ->orwhere('users.name', 'like' . '%' . $vkeyword . '%')
                ->select([
                    'peases.id as id',
                    'peases.cnt as cnt',
                    'peases.created_at as created_at',
                    'peases.updated_at as updated_at',
                    'users.name as creatername'
                ])
                ->orderBy('peases.created_at', '1')
                ->paginate(9);


            $updatername = Peas::join('users', 'users.id', '=', 'peases.updaterid')
                ->select('users.name')->get();
        }


        return view('/admin/All_Peas', compact('peases', 'updatername'));

    }



//======================================================================================================================
//Create
//======================================================================================================================
    public function create(Request $request)
    {

        //peas
        $vpeas = $request->validate(['peas' => 'regex:/^[0-9]+$/']);
        $vpeas = implode($vpeas);


        $c_peas = Peas::where('peases.cnt', $vpeas)
            ->count('id');

        if ($c_peas == '0') {

            Peas::insert([
                'cnt' => $vpeas,
                'createrid' => $request->userid,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect('/admin/All_Peas');
    }


//======================================================================================================================
//Update
//======================================================================================================================
    public function update(Request $request)
    {

        $vpeas = $request->validate(['peas' => 'regex:/^[0-9]+$/']);
        $vpeas = implode($vpeas);


        $c_peas = Peas::where('peases.cnt', $vpeas)
            ->count('id');

        if ($c_peas == '0') {

            Peas::where('id', $request->id)
                ->update([
                    'cnt' => $vpeas,
                    'updaterid' => $request->userid,
                    'updated_at' => now()
                ]);
        }

        return redirect('/admin/All_Peas');

    }



//======================================================================================================================
//
//======================================================================================================================
    //public function (){
    //
    //}
}
