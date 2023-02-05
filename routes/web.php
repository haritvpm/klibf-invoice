<?php

// Route::view('/', 'welcome');
Route::redirect('/', '/login');
//Route::redirect('/', '/klibf-app/login');


Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');



    // Publisher
    Route::delete('publishers/destroy', 'PublisherController@massDestroy')->name('publishers.massDestroy');
    Route::post('publishers/parse-csv-import', 'PublisherController@parseCsvImport')->name('publishers.parseCsvImport');
    Route::post('publishers/process-csv-import', 'PublisherController@processCsvImport')->name('publishers.processCsvImport');
    Route::resource('publishers', 'PublisherController');

    // Invoice Item
    Route::delete('invoice-items/destroy', 'InvoiceItemController@massDestroy')->name('invoice-items.massDestroy');
    Route::resource('invoice-items', 'InvoiceItemController');

    // Invoice List
    Route::delete('invoice-lists/destroy', 'InvoiceListController@massDestroy')->name('invoice-lists.massDestroy');
    Route::resource('invoice-lists', 'InvoiceListController');

    // Book Fest
    Route::resource('book-fests', 'BookFestController', ['except' => ['destroy']]);

        // Constituency
    Route::delete('constituencies/destroy', 'ConstituencyController@massDestroy')->name('constituencies.massDestroy');
    Route::post('constituencies/parse-csv-import', 'ConstituencyController@parseCsvImport')->name('constituencies.parseCsvImport');
    Route::post('constituencies/process-csv-import', 'ConstituencyController@processCsvImport')->name('constituencies.processCsvImport');
    Route::resource('constituencies', 'ConstituencyController');

    // Mla
    Route::delete('mlas/destroy', 'MlaController@massDestroy')->name('mlas.massDestroy');
    Route::post('mlas/parse-csv-import', 'MlaController@parseCsvImport')->name('mlas.parseCsvImport');
    Route::post('mlas/process-csv-import', 'MlaController@processCsvImport')->name('mlas.processCsvImport');
    Route::resource('mlas', 'MlaController');

    // Member Fund
    Route::get('member-funds/export', 'MemberFundController@export')->name('member-funds.export');
    Route::delete('member-funds/destroy', 'MemberFundController@massDestroy')->name('member-funds.massDestroy');
    Route::post('member-funds/parse-csv-import', 'MemberFundController@parseCsvImport')->name('member-funds.parseCsvImport');
    Route::post('member-funds/process-csv-import', 'MemberFundController@processCsvImport')->name('member-funds.processCsvImport');
    Route::resource('member-funds', 'MemberFundController');


    // Backup routes
    Route::resource('backups', 'BackupController');
    Route::get('backup/create', 'BackupController@create');
    Route::get('backup/download/{file_name}', 'BackupController@download');
    Route::get('backup/delete/{file_name}', 'BackupController@delete');
    
    
    
    
    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/parse-csv-import', 'ProductController@parseCsvImport')->name('products.parseCsvImport');
    Route::post('products/process-csv-import', 'ProductController@processCsvImport')->name('products.processCsvImport');
    Route::resource('products', 'ProductController');

    // Sale
    Route::get('sales/export', 'SaleController@export')->name('sales.export');
    Route::delete('sales/destroy', 'SaleController@massDestroy')->name('sales.massDestroy');
    Route::post('sales/parse-csv-import', 'SaleController@parseCsvImport')->name('sales.parseCsvImport');
    Route::post('sales/process-csv-import', 'SaleController@processCsvImport')->name('sales.processCsvImport');
    Route::resource('sales', 'SaleController');

    // Sale Item
    Route::delete('sale-items/destroy', 'SaleItemController@massDestroy')->name('sale-items.massDestroy');
    Route::post('sale-items/parse-csv-import', 'SaleItemController@parseCsvImport')->name('sale-items.parseCsvImport');
    Route::post('sale-items/process-csv-import', 'SaleItemController@processCsvImport')->name('sale-items.processCsvImport');
    Route::resource('sale-items', 'SaleItemController');



});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

   
    // Publisher
    Route::delete('publishers/destroy', 'PublisherController@massDestroy')->name('publishers.massDestroy');
    Route::resource('publishers', 'PublisherController');

    // Invoice List
    Route::delete('invoice-lists/destroy', 'InvoiceListController@massDestroy')->name('invoice-lists.massDestroy');
    Route::resource('invoice-lists', 'InvoiceListController');

    // Invoice Item
    Route::delete('invoice-items/destroy', 'InvoiceItemController@massDestroy')->name('invoice-items.massDestroy');
    Route::resource('invoice-items', 'InvoiceItemController');

    // Book Fest
    // Route::resource('book-fests', 'BookFestController', ['except' => ['destroy']]);

       // Constituency
    Route::delete('constituencies/destroy', 'ConstituencyController@massDestroy')->name('constituencies.massDestroy');
    Route::resource('constituencies', 'ConstituencyController');

    // Mla
    Route::delete('mlas/destroy', 'MlaController@massDestroy')->name('mlas.massDestroy');
    Route::resource('mlas', 'MlaController');

    // Member Fund
    Route::get('member-funds/export', 'MemberFundController@export')->name('member-funds.export');

    Route::delete('member-funds/destroy', 'MemberFundController@massDestroy')->name('member-funds.massDestroy');
    Route::resource('member-funds', 'MemberFundController');
    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
    
    
        // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::resource('products', 'ProductController');

    // Sale
    Route::delete('sales/destroy', 'SaleController@massDestroy')->name('sales.massDestroy');
    Route::resource('sales', 'SaleController');

    // Sale Item
    Route::delete('sale-items/destroy', 'SaleItemController@massDestroy')->name('sale-items.massDestroy');
    Route::resource('sale-items', 'SaleItemController');

    
    
});
