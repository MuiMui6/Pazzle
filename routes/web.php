<?php

//===============================================================================================================
//ItemController
//===============================================================================================================
//ユーザ商品検索
Route::get('/', 'ItemController@user_search');

//商品詳細
Route::get('/Detail', 'ItemController@detail');

Route::get('/Spotindex', 'SpotController@search');

Route::get('/Detail_Spot', 'SpotController@detail');




//Auth::routes();

Auth::routes(['verify'=>true]);

//ログインした人のみ見れる状態にする

Route::group(['middleware' => 'auth'], function () {
//===============================================================================================================
//AddreseController
//===============================================================================================================
//ユーザ
    Route::get('/All_Address', 'AddressController@view')->middleware('verified');

    Route::get('/Edit_Address', 'AddressController@userdetail')->middleware('verified');

    Route::post('/Edit_Address', 'AddressController@userupdate')->middleware('verified');

    Route::get('/Register_Address', 'AddressController@create')->middleware('verified');

    Route::post('/Register_Address', 'AddressController@save')->middleware('verified');

    Route::get('/admin/All_Address', 'AddressController@adminview')->middleware('verified');

    Route::get('/admin/All_Address/Search', 'AddressController@search')->middleware('verified');

    Route::get('/admin/All_Address/Detail', 'AddressController@detail')->middleware('verified');

    Route::post('/admin/Edit_Address/Update', 'AddressController@update')->middleware('verified');


//===============================================================================================================
//CartController
//===============================================================================================================
//確認
    Route::get('/Confirmation_Cart', 'CartController@Confirmation')->middleware('verified');

//追加
    Route::post('/Add_Cart', 'CartController@add')->middleware('verified');

//削除
    Route::post('/Delete_Cart', 'CartController@delete')->middleware('verified');

//全削除
    Route::post('/AllDelete_Cart', 'CartController@alldelete')->middleware('verified');

//宛先決定
    Route::post('/Topost_Cart', 'CartController@Topost')->middleware('verified');

//最終確認
    Route::post('/Register_Cart', 'CartController@register')->middleware('verified');

//確定後
    Route::post('/Registerd_Cart', 'CartController@registerd')->middleware('verified');

//購入履歴
    Route::get('/History_Cart', 'CartController@history')->middleware('verified');


//===============================================================================================================
//ItemCommentController　完了
//===============================================================================================================
//全ユーザ商品コメント投稿
    Route::post('/Detail', 'ItemCommentController@postitemcomment')->middleware('verified');

//管理者一覧検索
    Route::get('/admin/All_ItemComment', 'ItemCommentController@view')->middleware('verified');

//管理者検索
    Route::get('/admin/All_ItemComment/Search', 'ItemCommentController@search')->middleware('verified');

//管理者商品コメント可視不可視
    Route::post('/admin/All_ItemComment/ViewEdit', 'ItemCommentController@viewedit')->middleware('verified');


//===============================================================================================================
//ItemController
//===============================================================================================================
//商品一覧
    Route::get('/admin/All_Item', 'ItemController@adminview')->middleware('verified');

//商品一覧検索
    Route::get('/admin/All_Item/Search', 'ItemController@search')->middleware('verified');

//商品追加
    Route::get('/admin/Register_Item', 'ItemController@additem')->middleware('verified');

//商品新規追加
    Route::post('/admin/Register_Item', 'ItemController@save')->middleware('verified');

//商品編集
    Route::get('/admin/Edit_Item', 'ItemController@edit')->middleware('verified');

//商品編集保存
    Route::post('/admin/Edit_Item', 'ItemController@update')->middleware('verified');

//===============================================================================================================
//OrderController
//===============================================================================================================
//管理者側一覧
//一覧
    Route::get('/admin/All_Order', 'OrderController@view')->middleware('verified');

//検索
    Route::get('/admin/All_Order/Search', 'OrderController@search')->middleware('verified');

//編集
    Route::get('/admin/Edit_Order', 'OrderController@editview')->middleware('verified');
    Route::post('/admin/Edit_Order', 'OrderController@editsave')->middleware('verified');

//支払確認取り消し
    Route::post('/admin/Edit_Order/Delete', 'OrderController@dalete')->middleware('verified');

//PayDate
    Route::post('/History_Cart/PayDate', 'OrderController@paydate')->middleware('verified');

//Pay_Confirmor
    Route::post('/admin/All_Order/PayConfirmation', 'OrderController@payconfirmation')->middleware('verified');

//Ship_Date_Confirmor
    Route::post('/History_Cart/Ship_Date_Confirmation', 'OrderController@shipconfirmation')->middleware('verified');


//===============================================================================================================
//PeasController
//===============================================================================================================
    Route::get('/admin/All_Peas', 'PeasController@adminview')->middleware('verified');

    Route::get('/admin/All_Peas/Search', 'PeasController@search')->middleware('verified');

    Route::post('/admin/All_Peas/Create', 'PeasController@create')->middleware('verified');


//===============================================================================================================
//SizeController
//===============================================================================================================
    Route::get('/admin/All_Size', 'SizeController@adminview')->middleware('verified');

    Route::get('/admin/All_Size/Search', 'SizeController@search')->middleware('verified');

    Route::post('/admin/All_Size/Create', 'SizeController@create')->middleware('verified');



//===============================================================================================================
//SpotCommentController
//===============================================================================================================
    Route::post('/Detail_SpotComment', 'SpotCommentController@PostSpotComment')->middleware('verified');

    Route::get('/admin/All_SpotComment', 'SpotCommentController@adminview')->middleware('verified');

    Route::get('/admin/All_SpotComment/Search', 'SpotCommentController@search')->middleware('verified');

    Route::post('/admin/All_SpotComment/ViewEdit','SpotCommentController@viewedit')->middleware('verified');



//===============================================================================================================
//SpotController
//===============================================================================================================

    Route::get('/Edit_New_Article', 'SpotController@newspot')->middleware('verified');

    Route::get('/Edit_Article', 'SpotController@editspot')->middleware('verified');

    Route::post('/Save_Article', 'SpotController@save')->middleware('verified');

    Route::post('/Update_Article', 'SpotController@update')->middleware('verified');

    Route::get('/All_Article','SpotController@userarticle')->middleware('verified');

    Route::get('/admin/All_Spot','SpotController@adminview')->middleware('verified');

    Route::get('/admin/All_Spot/Search','SpotController@adminsearch')->middleware('verified');

//===============================================================================================================
//UserController
//===============================================================================================================
    Route::get('/Edit_User', 'UserController@view')->middleware('verified');

    Route::post('/Edit_User', 'UserController@userupdate')->middleware('verified');

    Route::get('/admin/All_User', 'UserController@adminview')->middleware('verified');

    Route::get('/admin/All_User/Search', 'UserController@search')->middleware('verified');

    Route::get('/admin/Edit_User/Detail', 'UserController@detail')->middleware('verified');

    Route::post('/admin/Edit_User/Detail', 'UserController@update')->middleware('verified');


});