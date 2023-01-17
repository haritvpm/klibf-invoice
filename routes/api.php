<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Member
    Route::apiResource('members', 'MemberApiController');

    // Publisher
    Route::apiResource('publishers', 'PublisherApiController');

    // Invoice Item
    Route::apiResource('invoice-items', 'InvoiceItemApiController');

    // Invoice List
    Route::apiResource('invoice-lists', 'InvoiceListApiController');
});
