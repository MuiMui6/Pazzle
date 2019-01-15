<?php

Auth::routes();

//============================================================================
//CartController
//============================================================================
//確認
Route::get('/Confirmation_Cart', 'CartController@Confirmation');

//追加
Route::post('/Add_Cart', 'CartController@add');

//削除
Route::post('/Delete_Cart', 'CartController@delete');

//全削除
Route::post('/AllDelete_Cart', 'CartController@alldelete');

//宛先決定
Route::post('/Topost_Cart', 'CartController@Topost');

//最終確認
Route::post('/Register_Cart', 'CartController@register');

//確定後
Route::post('/Registerd_Cart', 'CartController@registerd');

//購入履歴
Route::get('/History_Cart', 'CartController@history');


//============================================================================
//ItemController
//============================================================================
//ユーザ商品検索
Route::get('/', 'ItemController@user_search');

//商品詳細
Route::get('/Detail', 'ItemController@detail');


//============================================================================
//OrderController
//============================================================================
//管理者側一覧
//一覧
Route::get('/admin/All_Order', 'OrderController@view');

//検索
Route::get('/admin/All_Order/Search', 'OrderController@search');

//
Route::get('/admin/All_Order/paysearch', 'OrderController@paysearch');

//
Route::get('/admin/All_Order/shipsearch', 'OrderController@shipsearch');

//編集
Route::get('/admin/Edit_Order', 'OrderController@editview');
Route::post('/admin/Edit_Order', 'OrderController@editsave');

//PayDate
Route::post('/History_Cart/Pay_Date', 'OrderController@paydate');

//Pay_Confirmor
Route::post('/admin/All_Order/PayConfirmation', 'OrderController@payconfirmation');

//Ship_Date_Confirmor
Route::post('/History_Cart/Ship_Date_Confirmation', 'OrderController@shipconfirmation');