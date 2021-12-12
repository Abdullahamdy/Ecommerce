<?php

use App\Http\Controllers\frontend\ProductController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/clear-cache', function () {

    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return 'done';
});
Route::get('/','frontend\HomeController@index')->name('front.main');
Route::get('/home', 'frontend\HomeController@chatindex')->name('home');

Route::group(['namespace'=>'frontend','middleware'=>'auth:client'],function(){

Route::get('product/{id}','HomeController@product')->name('product');
    Route::get('who-are','WhoAreController@index')->name('who-are');
    Route::get('contact-us','ContactUsController@getForm')->name('contact-us');
    Route::post('contact-us','ContactUsController@subForm')->name('contact-us');
    Route::get('terms','TermsController@index')->name('terms');
    Route::get('profile','ProfileController@index')->name('profile');
    // Route::post('submit-form', 'ProductController@store');
    Route::get('profile-edit/{id}','ProfileController@edit')->name('profile-edit');
    Route::post('update-profile','ProfileController@update')->name('update-profile');
     Route::get('add-product','ProductController@addProduct')->name('add-product');
     Route::get('edit-product/{id}','ProductController@edit')->name('edit-product');
     Route::post('add-product','ProductController@insertProduct')->name('add-product');
     Route::post('update-product/{id}','ProductController@updateProduct')->name('update-product');
     Route::post('delete-product/{id}','ProductController@deleteProduct')->name('delete-product');
     Route::get('/inbox', 'inboxController@index')->name('inbox.index');
     Route::get('/inbox/{id}','inboxController@show')->name('inbox.show');
     Route::get('show-fav','ProductController@showFavourite')->name('show-fav');
Route::get('show-details/{id}','ProductController@showDetails')->name('show-details');
Route::post('insertrating','ProductController@store')->name('insertrating');
// Route::get('rat','ProductController@testrat')->name('rat');
Route::get('supplier/{id}','ProductController@supplierProduct')->name('supplier');
Route::get('rates','ProductController@highRating')->name('rates');
Route::post('delete-favourite/{id}','ProfileController@deleteFavourite')->name('delete-favourite');
Route::get('user','frontend\FavouriteController@index');
Route::get('/productsearch', 'frontend\ProductController@search')->name('productsearch');
Route::get('/productsearch-brand', 'frontend\ProductController@searchBrand')->name('productsearch-brand');
Route::get('productsearch-status','frontend\ProductController@searchStatus')->name('productsearch-status');
Route::get('productsearch-color','frontend\ProductController@searchColor')->name('productsearch-color');
Route::get('productsearch-price','frontend\ProductController@searchPrice')->name('productsearch-price');

});
Route::view('who', 'frontend.who-are')->name('who');
// Route::view('chat', 'livewire.chat')->name('chat');
Route::get('/client-register','frontend\clientloginController@getFormAccount')->name('client-register');
Route::post('/create-account','frontend\clientloginController@register')->name('create-account');
Route::get('/clientlogin', 'frontend\clientloginController@index')->name('clientlogin');
Route::post('/clientLogin', 'frontend\clientloginController@login')->name('clientLogin');
Route::post('/logout', 'frontend\clientloginController@logout')->name('logout');

Route::view('/login','frontend.authClient.login')->name('client.login');
Route::get('user','frontend\FavouriteController@index');
Route::get('/productsearch', 'frontend\ProductController@search')->name('productsearch');
Route::get('/productsearch-brand', 'frontend\ProductController@searchBrand')->name('productsearch-brand');
Route::get('productsearch-status','frontend\ProductController@searchStatus')->name('productsearch-status');
Route::get('productsearch-color','frontend\ProductController@searchColor')->name('productsearch-color');
Route::get('productsearch-price','frontend\ProductController@searchPrice')->name('productsearch-price');

Route::get('add/cart/{id}','api\FavouriteController@AddCart');
Route::get('search/{inp}','api\FavouriteController@searchProaj');

