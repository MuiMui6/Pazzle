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
//PayDate
Route::post('/History_Cart/Pay_Date', 'OrderController@paydate');

//Pay_Confirmor
Route::post('/', 'OrderController@payconfirmation');

//ShipDate
Route::post('/', 'OrderController@');

//Ship_Confirmor
Route::post('/History_Cart/Ship_Confirmation', 'OrderController@shipconfirmation');