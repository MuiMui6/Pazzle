<?php

//===============================================================================================================
//ItemController
//===============================================================================================================
//ユーザ商品検索
Route::get('/', 'ItemController@user_search');

//商品詳細
Route::get('/Detail', 'ItemController@detail');


Auth::routes();

//ログインした人のみ見れる状態にする

Route::group(['middleware' => 'auth'], function () {
//===============================================================================================================
//AddreseController
//===============================================================================================================
//ユーザ
    Route::get('/All_Address', 'AddressController@view');

    Route::get('/Edit_Address', 'AddressController@userdetail');

    Route::post('/Edit_Address', 'AddressController@userupdate');

    Route::get('/Register_Address', 'AddressController@create');

    Route::post('/Register_Address', 'AddressController@save');

//完成
    Route::get('/admin/All_Address', 'AddressController@search');

    Route::get('/admin/All_Address/Detail', 'AddressController@detail');

    Route::post('/admin/Edit_Address/Update', 'AddressController@update');


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
//User Post
    Route::post('/Detail','ItemCommentController@postitemcomment');


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
    Route::post('/History_Cart/PayDate', 'OrderController@paydate');

//Pay_Confirmor
    Route::post('/admin/All_Order/PayConfirmation', 'OrderController@payconfirmation');

//Ship_Date_Confirmor
    Route::post('/History_Cart/Ship_Date_Confirmation', 'OrderController@shipconfirmation');


//===============================================================================================================
//PeasController
//===============================================================================================================
    Route::get('/admin/All_Peas', 'PeasController@search');

    Route::post('/admin/All_Peas/Create', 'PeasController@create');

    Route::post('/admin/All_Peas/Update', 'PeasController@update');


//===============================================================================================================
//SizeController
//===============================================================================================================
    Route::get('/admin/All_Size', 'SizeController@search');

    Route::post('/admin/All_Size/Create', 'SizeController@create');

    Route::post('/admin/All_Size/Update', 'SizeController@update');


//===============================================================================================================
//SpotCommentController
//===============================================================================================================


//===============================================================================================================
//SpotController
//===============================================================================================================
    Route::get('/Spotindex', 'SpotController@search');

    Route::get('/Detail_Spot', 'SpotController@detail');

    Route::get('/Edit_New_Article', 'SpotController@newspot');

    Route::get('/Edit_Article', 'SpotController@editspot');

    Route::post('/Save_Article', 'SpotController@save');

    Route::post('/Update_Article', 'SpotController@update');

//===============================================================================================================
//UserController
//===============================================================================================================
    Route::get('/Edit_User', 'UserController@view');

    Route::post('/Edit_User', 'UserController@userupdate');

    Route::get('/admin/All_User', 'UserController@search');

    Route::get('/admin/Edit_User/Detail', 'UserController@detail');

    Route::post('/admin/Edit_User/Detail', 'UserController@update');


});