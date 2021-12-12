<?php
use Illuminate\Support\Facades\Route;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route as FacadesRoute;


Route::group(['middleware' => ['guest:web']], function () {
    Route::get('/login', 'AuthController@viewLogin')->name('admin.login');
    Route::post('/login', 'AuthController@login');
});





Route::group(['middleware' => ['auth:web']], function () {
  //  Route::get('/', 'HomeController@index');
  Route::get('/inbox', 'inboxController@index')->name('inbox.index');
  Route::get('/inbox/{id}','inboxController@show')->name('inbox.show');
    Route::get('home', 'HomeController@index')->name('adminlogout');

    Route::get('home', 'HomeController@index')->name('admin.home');
    Route::post('admin-logout', 'AuthController@adminLogout')->name('admin.logout');
//    Route::get('settings', 'SettingController@view');
//    Route::post('settings', 'SettingController@update');
//    Route::resource('developer/settings/categories', 'SettingCategoryController');
//    Route::resource('users', 'UserController');
//    Route::get('users/toggle-boolean/{id}/{action}', 'UserController@toggleBoolean')->name('facilities.users.toggleBoolean');

    Route::resource('social-media', 'SocialController');
    Route::resource('contact-us', 'ContactusController');
    Route::resource('client', 'ClientController');
    Route::resource('advertising', 'AdvertisingController');
    Route::resource('terms', 'TermsController');
    Route::resource('who-are', 'WhoAreController');
    Route::resource('product', 'ProductsController');
    Route::resource('category', 'CategoriesController');
    Route::get('show-attachment/{id}', 'productsController@getAttachment')->name('show-attachment');
    Route::delete('delete-attachmentProduct/{id}', 'productsController@deleteAttachment')->name('delete-attachmentProduct');
    Route::delete('edit-attachmentProduct/{id}', 'productsController@editAttachment')->name('edit-attachmentProduct');
    Route::get('clients/toggle-boolean/{id}/{action}', 'ClientController@toggleBoolean')->name('facilities.users.toggleBoolean');
    Route::get('show-AdvertisingAttachment/{id}', 'AdvertisingController@getAttachment')->name('show-AdvertisingAttachment');
    Route::delete('delete-advertisingAttachment/{id}', 'AdvertisingController@deleteAttachment')->name('delete-advertisingAttachment');
    Route::delete('edit-advertisingAttachment/{id}', 'AdvertisingController@editAttachment')->name('edit-advertisingAttachment');

    Route::get('show-who-are/{id}', 'WhoAreController@getAttachment')->name('show-who-are');
    Route::delete('delete-who-are/{id}', 'WhoAreController@deleteAttachment')->name('delete-who-are');
    Route::delete('edit-who-are/{id}', 'WhoAreController@editAttachment')->name('edit-who-are');



});
