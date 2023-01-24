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

    // Member
    Route::delete('members/destroy', 'MemberController@massDestroy')->name('members.massDestroy');
    Route::post('members/parse-csv-import', 'MemberController@parseCsvImport')->name('members.parseCsvImport');
    Route::post('members/process-csv-import', 'MemberController@processCsvImport')->name('members.processCsvImport');
    Route::get('members/export', 'MemberController@export', 'export')->name('members.export');;
    Route::resource('members', 'MemberController');

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


    // Backup routes
    Route::resource('backups', 'BackupController');
    Route::get('backup/create', 'BackupController@create');
    Route::get('backup/download/{file_name}', 'BackupController@download');
    Route::get('backup/delete/{file_name}', 'BackupController@delete');


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

    // Member
    Route::get('members/export', 'MemberController@export', 'export')->name('members.export');;
    Route::delete('members/destroy', 'MemberController@massDestroy')->name('members.massDestroy');
    Route::resource('members', 'MemberController');

    // Publisher
    Route::delete('publishers/destroy', 'PublisherController@massDestroy')->name('publishers.massDestroy');
    Route::resource('publishers', 'PublisherController');

    // Invoice List
    Route::delete('invoice-lists/destroy', 'InvoiceListController@massDestroy')->name('invoice-lists.massDestroy');
    Route::resource('invoice-lists', 'InvoiceListController');

    // Invoice Item
    Route::delete('invoice-items/destroy', 'InvoiceItemController@massDestroy')->name('invoice-items.massDestroy');
    Route::resource('invoice-items', 'InvoiceItemController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
