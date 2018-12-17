<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//全ユーザ共通
    //トップ
    Route::get('/', function () {
        return view('home');
    });

    //商品詳細
    Route::get('/Detail_Item', function () {
        return view('Detail_Item');
    });

    //観光地一覧
    Route::get('/All_Spot', function () {
        return view('All_Spot');
    });

    //観光地詳細
    Route::get('/Detail_Spot', function () {
        return view('Detail_Spot');
    });

    //住所一覧
    Route::get('/All_Address', function () {
        return view('All_Address');
    });

    //住所詳細
    Route::get('/Edit_Address', function () {
        return view('Edit_Address');
    });

    //カート
    Route::get('/Register_Cart', function () {
        return view('Register_Cart');
    });

    //カート確認
    Route::get('/Confirmor_Cart', function () {
        return view('Confirmor_Cart');
    });

    //カート履歴
    Route::get('/History_Cart', function () {
        return view('History_Cart');
    });

    //ユーザ詳細
    Route::get('/Edit_User', function () {
        return view('Edit_User');
    });

//管理者のみ
////一覧系
//    //住所一覧
//    Route::get('/', function () {
//        return view('admin.');
//    });
//
//    //商品一覧
//    Route::get('/', function () {
//        return view('admin.');
//    });
//
//    //商品コメント一覧
//    Route::get('/', function () {
//        return view('admin.');
//    });
//
//    //受注一覧
//    Route::get('/', function () {
//        return view('admin.');
//    });
//
//    //ピース一覧
//    Route::get('/', function () {
//        return view('admin.');
//    });
//
//    //サイズ一覧
//    Route::get('/', function () {
//        return view('admin.');
//    });
//
//    //観光地一覧
//    Route::get('/', function () {
//        return view('admin.');
//    });
//
//    //観光地コメント一覧
//    Route::get('/', function () {
//        return view('admin.');
//    });
//
//    //タグ一覧
//    Route::get('/', function () {
//        return view('admin.');
//    });
//
//    //ユーザ一覧
//    Route::get('/', function () {
//        return view('admin.');
//    });
//
////編集
//    //住所編集
//    Route::get('/', function () {
//        return view('admin.Edit_');
//    });
//
//    //商品編集
//    Route::get('/', function () {
//        return view('admin.Edit_');
//    });
//
//    //商品コメント編集
//    Route::get('/', function () {
//        return view('admin.Edit_');
//    });
//
//    //受注編集
//    Route::get('/', function () {
//        return view('admin.Edit_');
//    });
//
//    //観光地編集
//    Route::get('/', function () {
//        return view('admin.Edit_');
//    });
//
//    //観光地コメント編集
//    Route::get('/', function () {
//        return view('admin.Edit_');
//    });
//
//    //ユーザ編集
//    Route::get('/', function () {
//        return view('admin.Edit_');
//    });
//

