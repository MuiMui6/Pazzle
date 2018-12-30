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
Route::get('/Register_Cart', 'CartController@register');

//確定後
Route::get('/Registerd_Cart', 'CartController@degisterd');


//============================================================================
//ItemController
//============================================================================
//ユーザ商品検索
Route::get('/', 'ItemController@user_search');

//商品詳細
Route::get('/Detail', 'ItemController@detail');