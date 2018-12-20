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

//住所詳細V
Route::get('/Edit_Address', function () {
    return view('Edit_Address');
});

//カート確認V
Route::get('/Confirmor_Cart', function () {
    return view('Confirmor_Cart');
});

//カート完了V
Route::get('/Registerd_Cart', function () {
    return view('Registerd_Cart');
});

//カート履歴V
Route::get('/History_Cart', function () {
    return view('History_Cart');
});

//宛先確認V
Route::get('/Register_Topost', function () {
    return view('Register_Topost');
});

//宛先確認V
Route::get('/Register_Cart', function () {
    return view('Register_Cart');
});

//ユーザ詳細
Route::get('/Edit_User', function () {
    return view('Edit_User');
});

//管理者のみ
//一覧系
//住所一覧
Route::get('/Admin/All_Address', function () {
    return view('admin.All_Address');
});

//商品一覧
Route::get('/Admin/All_Item', function () {
    return view('admin.All_Item');
});

//商品コメント一覧
Route::get('/Admin/All_ItemComment', function () {
    return view('admin.All_ItemComment');
});

//受注一覧
Route::get('/Admin/All_Order', function () {
    return view('admin.All_Order');
});

//ピース一覧
Route::get('/Admin/All_Peas', function () {
    return view('admin.All_Peas');
});

//サイズ一覧
Route::get('/Admin/All_Size', function () {
    return view('admin.All_Size');
});

//観光地一覧
Route::get('/Admin/All_Spot', function () {
    return view('admin.All_Spot');
});

//観光地コメント一覧
Route::get('/Admin/All_SpotComment', function () {
    return view('admin.All_SpotComment');
});

//タグ一覧
Route::get('/Admin/All_Tag', function () {
    return view('admin.All_Tag');
});

//ユーザ一覧
Route::get('/Admin/All_User', function () {
    return view('admin.All_User');
});

//編集
//住所編集
Route::get('/Admin/Edit_Address', function () {
    return view('admin.Edit_Address');
});

//商品編集
Route::get('/Admin/Edit_Item', function () {
    return view('admin.Edit_Item');
});

//商品コメント編集
Route::get('/Admin/Edit_ItemComment', function () {
    return view('admin.Edit_ItemComment');
});

//    //受注編集
Route::get('/Admin/Edit_Order', function () {
    return view('admin.Edit_Order');
});

//観光地編集
Route::get('/Admin/Edit_Spot', function () {
    return view('admin.Edit_Spot');
});

//観光地コメント編集
Route::get('/Admin/Edit_SpotComment', function () {
    return view('admin.Edit_SpotComment');
});

//ユーザ編集
Route::get('/Admin/Edit_User', function () {
    return view('admin.Edit_User');
});

