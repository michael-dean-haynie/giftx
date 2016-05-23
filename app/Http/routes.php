<?php

Route::auth();
Route::get('/temp-home', 'PagesController@getTempHome');
Route::get('/test-croppie', 'PagesController@testCroppie');
Route::get('/test/{userID?}', 'PagesController@test');


Route::group(['middleware' => ['auth']], function(){
    Route::get('/', function(){
        return redirect(url('/profile'));
    });
    Route::get('/groups', 'PagesController@getGroups');

    /* Profile Related Routes*/
    Route::get('/profile', 'PagesController@getProfile');
    Route::get('edit-profile', 'PagesController@getEditProfile');
    Route::post('edit-profile', 'PagesController@postEditProfile');
    Route::get('edit-picture', 'PagesController@getEditPicture');
    Route::post('edit-picture', 'PagesController@postEditPicture');
    Route::post('delete-picture', 'PagesController@postDeletePicture');
    Route::get('reset-password', 'PagesController@getResetPassword');
    Route::post('reset-password', 'PagesController@postResetPassword');

    Route::get('crop-picture', 'PagesController@getCropPicture');
    Route::post('crop-picture', 'PagesController@postCropPicture');

    /* User */
    Route::get('user/{userID}', 'PagesController@getUser');

    /* Group */
    Route::get('/groups', 'PagesController@getGroups');
    Route::get('group/{groupID}', 'PagesController@getGroup');
    Route::get('/create-group', 'PagesController@getCreateGroup');
    Route::post('/create-group', 'PagesController@postCreateGroup');

    /* Messages */
    Route::get('messages', 'PagesController@getMessages');

    /* AJAX */
    Route::post('ajax/messages/search-users', 'AjaxController@messagesSearchUsers');
    Route::post('ajax/messages/update-chat', 'AjaxController@messagesUpdateChat');
    Route::post('ajax/messages/load-older-messages', 'AjaxController@messagesLoadOlderMessages');
    Route::post('ajax/messages/send-message', 'AjaxController@messagesSendMessage');
    Route::post('ajax/messages/auto-update-chat', 'AjaxController@messagesAutoUpdateChat');

    /* Misc. */
    Route::get('add-wish', 'PagesController@getAddWish');
    Route::post('add-wish', 'PagesController@postAddWish');
    Route::get('edit-wish/{wishID}', 'PagesController@getEditWish');
    Route::post('edit-wish', 'PagesController@postEditWish');
    Route::get('delete-wish/{wishID}', 'PagesController@getDeleteWish');
    Route::post('delete-wish', 'PagesController@postDeleteWish');
    Route::get('call-dibbs/{wishID}', 'PagesController@getCallDibbs');
    Route::post('call-dibbs', 'PagesController@postCallDibbs');
    Route::get('give-up-dibbs/{wishID}', 'PagesController@getGiveUpDibbs');
    Route::post('give-up-dibbs', 'PagesController@postGiveUpDibbs');

});

