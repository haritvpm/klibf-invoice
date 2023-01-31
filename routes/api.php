<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Constituency
    Route::apiResource('constituencies', 'ConstituencyApiController');

    // Publisher
    Route::apiResource('publishers', 'PublisherApiController');

    // Book Fest
    Route::apiResource('book-fests', 'BookFestApiController', ['except' => ['destroy']]);

    // Mla
    Route::apiResource('mlas', 'MlaApiController');

    // Invoice List
    Route::apiResource('invoice-lists', 'InvoiceListApiController');

    // Invoice Item
    Route::apiResource('invoice-items', 'InvoiceItemApiController');

    // Product
    Route::apiResource('products', 'ProductApiController');

    // Sale
    Route::apiResource('sales', 'SaleApiController');

    // Sale Item
    Route::apiResource('sale-items', 'SaleItemApiController');
});
