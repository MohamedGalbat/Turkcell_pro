<?php
Route::middleware('auth')->group(function () {

    Route::get('/main', "FrdController@index");
    Route::get('/frd/{id}', "FrdController@showById")->name('showing_frd');

    Route::post('/search', "FrdController@ReqSearch");
    Route::post('/MySearch', "FrdController@MyReqSearch");

    Route::post('/api/save', "FrdController@store");
    Route::get('/search', "FrdController@search");
    Route::get('/myrequests', "UserController@MyRequests");
    Route::get('/ReqCreate', "PanelController@description");

    Route::post('/addcomment', "CommentController@createComment");
    Route::get('/addcomment/attach/{id}', "CommentController@download");

    Route::get('/addAttachment/attach/{id}', "DisplayAllController@download");

    Route::get('/audience/{id}', "AudienceController@showAudience");
    Route::post('/audience/{id}', "AudienceController@store");

    Route::get('/channel/{id}', "ChannelController@showChannel");
    Route::post('/channel/{id}', "ChannelController@store");

    Route::get('/profile', "UserController@MyProfile");
    Route::get('/pic', "FRDController@profilePic");

    Route::get('/attach/{id}', "AttachmentController@display");
    Route::post('/storeAtt/{id}', "AttachmentController@StoreAttachment");

    Route::get('/sms/{id}', "SmsController@display");
    Route::post('/store/{id}', "SmsController@storeSms");


    Route::get('/discounts/{id}', "DiscountsController@display");
    Route::post('/discounts/{id}', "DiscountsController@storeDiscounts");


    Route::get('/displayAll/{id}', "DisplayAllController@displayAll");
    Route::get('/displayReq/{id}', "DisplayAllController@displayReq");

    Route::get('/document/submit/{document_id}', "DisplayAllController@submit");


    Route::get('/', 'HomeController@index');

    /*Route::get('/logout', 'Auth\LoginController@logout');
    */

// function to produce encrypted password
    Route::get('/pass/{string}', function ($string) {
        return bcrypt($string);

    });
    Route::get('/permission/manager', 'managerController@permission');

    //place the routes of the manager here
    Route::middleware('onlyManager')->group(function () {
        Route::get('/pendingReq', "managerController@display");
        Route::get('/viewedReq', "managerController@displayViewed");
        Route::get('/approve/{id}', "managerController@approve");
        Route::get('/disApprove/{id}', "managerController@disapprove");
        Route::get('/displayViewed/{id}', "managerController@viewed");
        Route::post('/searchMan', "managerController@managerSearch");
        Route::post('/searchPend', "managerController@pendingSearch");
        Route::get('/displayRequest/{id}', "DisplayAllController@displayReq");



    });

});

Auth::routes();
