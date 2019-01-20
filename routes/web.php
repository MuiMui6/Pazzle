<?php

Auth::routes();

//===============================================================================================================
//AddreseController
//===============================================================================================================


//===============================================================================================================
//CartController
//===============================================================================================================
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


//===============================================================================================================
//ItemCommentController
//===============================================================================================================
//admin view
Route::get('/admin/All_ItemComment', 'ItemCommentController@view');

//admin search
Route::get('/admin/All_ItemComment/Search', 'ItemCommentController@search');
Route::get('/admin/All_ItemComment/Date', 'ItemCommentController@datesearch');

//admin view edit
Route::post('/admin/All_ItemComment/ViewEdit', 'ItemCommentController@viewedit');



//===============================================================================================================
//ItemController
//===============================================================================================================
//ユーザ商品検索
Route::get('/', 'ItemController@user_search');

//商品詳細
Route::get('/Detail', 'ItemController@detail');


//===============================================================================================================
//OrderController
//===============================================================================================================
//管理者側一覧
//一覧
Route::get('/admin/All_Order', 'OrderController@view');

//検索
Route::get('/admin/All_Order/Search', 'OrderController@search');

//日付関係の検索
Route::get('/admin/All_Order/Date', 'OrderController@datesearch');

//編集
Route::get('/admin/Edit_Order', 'OrderController@editview');
Route::post('/admin/Edit_Order', 'OrderController@editsave');

//支払確認取り消し
Route::post('/admin/Edit_Order/Delete', 'OrderController@dalete');

//PayDate
Route::post('/History_Cart/Pay_Date', 'OrderController@paydate');

//Pay_Confirmor
Route::post('/admin/All_Order/PayConfirmation', 'OrderController@payconfirmation');

//Ship_Date_Confirmor
Route::post('/History_Cart/Ship_Date_Confirmation', 'OrderController@shipconfirmation');


//===============================================================================================================
//PeasController
//===============================================================================================================




//===============================================================================================================
//SizeController
//===============================================================================================================




//===============================================================================================================
//SpotCommentController
//===============================================================================================================




//===============================================================================================================
//SpotController
//===============================================================================================================
Route::get ('/Spotindex', 'SpotController@search');

Route::get ('/Detail_Spot', 'SpotController@detail');

Route::get ('/Edit_New_Article', 'SpotController@newspot');

Route::get ('/Edit_Article', 'SpotController@editspot');

Route::post('/Save_Article', 'SpotController@save');

Route::post('/Update_Article', 'SpotController@update');

//===============================================================================================================
//TagController
//===============================================================================================================




//===============================================================================================================
//UserController
//===============================================================================================================




//===============================================================================================================
//WarehouseController
//===============================================================================================================



