<?php

Auth::routes();

//============================================================================
//AddressController
//============================================================================
//ユーザ表示
Route::get('/Edit_Address', 'AddressController@user_view');

//管理者表示
Route::get('/Admin/All_Address', 'AddressController@admin_view');

//管理者検索
Route::get('/Admin/All_Address', 'AddressController@admin_search');

//ユーザ詳細
Route::get('/Edit_Address', 'AddressController@user_detail');

//管理者詳細
Route::get('/Admin/Edit_Address', 'AddressController@admin_detail');

//ユーザ追加
Route::get('/Edit_Address', 'AddressController@user_add');
Route::post('/Edit_Address', 'AddressController@user_add');

//管理者追加
Route::get('/Admin/Edit_Address', 'AddressController@admin_add');
Route::post('/Admin/Edit_Address', 'AddressController@admin_add');

//ユーザ編集
Route::get('/Edit_Address', 'AddressController@user_edit');
Route::post('/Edit_Address', 'AddressController@user_edit');

//管理者編集
Route::get('/Admin/Edit_Address', 'AddressController@admin_edit');
Route::post('/Admin/Edit_Address', 'AddressController@admin_edit');


//============================================================================
//CartController
//============================================================================
//確認
Route::get('/Confirmor_Cart', 'CartController@confirmor');

//追加
Route::post('/Add_Cart', 'CartController@add');

//削除
Route::get('/Delete_Cart', 'CartController@delete');

//全削除
Route::get('/AllDelete_Cart', 'CartController@all_delete');

//宛先決定
Route::get('/Topost_Cart', 'CartController@Topost');

//最終確認
Route::get('/Register_Cart', 'CartController@register');

//確定後
Route::get('/Registerd_Cart', 'CartController@degisterd');


//============================================================================
//ItemController
//============================================================================
//管理者商品表示
Route::get('/admin/All_Item', 'ItemController@admin_view');

//ユーザ商品検索
Route::get('/', 'ItemController@user_search');

//管理者商品検索
Route::get('/Admin/All_Item', 'ItemController@admin_search');

//商品詳細
Route::get('/Detail', 'ItemController@detail');

//商品追加
Route::get('/Admin/ItemEdit', 'ItemController@add');
Route::post('/Admin/ItemEdit', 'ItemController@add');

//商品編集
Route::get('/Admin/ItemEdit', 'ItemController@edit');
Route::post('/Admin/ItemEdit', 'ItemController@edit');


//============================================================================
//ItemCommentController
//============================================================================
//管理者表示
Route::get('/Admin/All_ItemComment', 'ItemCommentController@view');

//管理者検索
Route::get('/Admin/All_ItemComment', 'ItemCommentController@search');

//管理者詳細
Route::get('/Admin/All_ItemComment', 'Controller@detail');

//ユーザ追加
Route::get('/Detail_Item', 'ItemCommentController@add');
Route::post('/Detail_Item', 'ItemCommentController@add');

//管理者編集
Route::get('/Admin/Edit_ItemComment', 'ItemCommentController@edit');
Route::post('/Admin/Edit_ItemComment', 'ItemCommentController@edit');


//============================================================================
//OrderController
//============================================================================
//管理者表示
Route::get('/Admin/All_Order', 'OrderController@view');

//管理者検索
Route::get('/Admin/All_Order', 'OrderController@search');

//管理者詳細
Route::get('/Admin/Edit_Order', 'OrderController@detail');

//管理者編集
Route::get('/Admin/Edit_Order', 'OrderController@edit');
Route::post('/Admin/Edit_Order', 'OrderController@edit');


//============================================================================
//PeasController
//============================================================================
//管理者表示
Route::get('/Admin/All_Peas', 'PeasController@view');

//管理者検索
Route::get('/Admin/All_Peas', 'PeasController@search');

//管理者追加
Route::get('/Admin/Edit_Peas', 'PeasController@add');
Route::post('/Admin/Edit_Peas', 'PeasController@add');

//管理者編集
Route::get('/Admin/Edit_Peas', 'PeasController@edit');
Route::post('/Admin/Edit_Peas', 'PeasController@edit');


//============================================================================
//SizeController
//============================================================================
//管理者表示
Route::get('/Admin/All_Size', 'SizeController@view');

//管理者検索
Route::get('/Admin/All_Size', 'SizeController@search');

//管理者追加
Route::get('/Admin/Edit_Size', 'SizeController@add');
Route::post('/Admin/Edit_Size', 'SizeController@add');

//管理者編集
Route::get('/Admin/Edit_Size', 'SizeController@edit');
Route::post('/Admin/Edit_Size', 'SizeController@edit');


//============================================================================
//SpotController
//============================================================================
//ユーザ表示
Route::get('/All_Spot', 'SpotController@user_view');

//管理者表示
Route::get('/Admin/All_Spot', 'SpotController@admin_view');

//ユーザ検索
Route::get('/All_Spot', 'SpotController@user_search');

//管理者検索
Route::get('/Admin/All_Spot', 'SpotController@admin_search');

//ユーザ詳細
Route::get('/Detail_Spot', 'SpotController@user_detail');

//管理者追加
Route::get('/Admin/Edit_Spot', 'SpotController@admin_add');
Route::post('/Admin/Edit_Spot', 'SpotController@admin_add');

//管理者編集
Route::get('/Admin/Edit_Spot', 'SpotController@admin_edit');
Route::post('/Admin/Edit_Spot', 'SpotController@admin_edit');


//============================================================================
//SpotCommentController
//============================================================================
//管理者表示
Route::get('/Admin/All_SpotComment', 'SpotCommentController@view');

//管理者検索
Route::get('/Admin/All_SpotComment', 'SpotCommentController@search');

//管理者詳細
Route::get('/Admin/Edit_SpotComment', 'SpotCommentController@detail');

//ユーザ追加
Route::get('/Detail_Spot', 'SpotCommentController@add');
Route::post('/Detail_Spot', 'SpotCommentController@add');

//管理者編集
Route::get('/Admin/Edit_SpotComment', 'SpotCommentController@edit');
Route::post('/Admin/Edit_SpotComment', 'SpotCommentController@edit');


//============================================================================
//TagController
//============================================================================
//管理者表示
Route::get('/Admin/All_Tag', 'TagController@view');

//管理者検索
Route::get('/Admin/All_Tag', 'TagController@search');

//管理者追加
Route::get('/Admin/Edit_Tag', 'TagController@add');
Route::post('/Admin/Edit_Tag', 'TagController@add');

//管理者編集
Route::get('/Admin/Edit_Tag', 'TagController@edit');
Route::post('/Admin/Edit_Tag', 'TagController@edit');


//============================================================================
//UserController
//============================================================================
//ユーザ表示
Route::get('/All_User', 'UserController@user_view');

//管理者表示
Route::get('/Admin/All_User', 'UserController@admin_view');

//ユーザ検索
Route::get('/All_User', 'UserController@user_search');

//管理者検索
Route::get('/Admin/All_User', 'UserController@admin_search');

//ユーザ詳細
Route::get('/Edit_User', 'UserController@user_detail');

//管理者詳細
Route::get('/Admin/Edit_User', 'UserController@admin_detail');

//ユーザ編集
Route::get('/Edit_User', 'UserController@user_edit');
Route::post('/Edit_User', 'UserController@user_edit');

//管理者編集
Route::get('/Admin/Edit_User', 'UserController@admin_edit');
Route::post('/Admin/Edit_User', 'UserController@admin_edit');


//============================================================================
//WarehouseController
//============================================================================
//管理者表示
Route::get('/Admin/All_Warehouse', 'WarehouseController@view');

//管理者検索
Route::get('/Admin/All_Warehouse', 'WarehouseController@search');

//管理者詳細
Route::get('/Admin/Edit_Warehouse', 'WarehouseController@detail');

//管理者追加
Route::get('/Admin/Edit_Warehouse', 'WarehouseController@add');
Route::post('/Admin/Edit_Warehouse', 'WarehouseController@add');

//管理者編集
Route::get('/Admin/Edit_Warehouse', 'WarehouseController@edit');
Route::post('/Admin/Edit_Warehouse', 'WarehouseController@edit');