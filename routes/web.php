<?php

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Auth::routes();
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', function()
    {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('auctions', 'ArticlesController');
    Route::get('/myauctions', 'ArticlesController@myauctions')->name('myauctions');
    Route::get('/buynow/{id}',"ArticlesController@buyNow");

    Route::get('auctionbidding/{id}',"ArticlesController@showbiddingForm");
    Route::post('bid',"ArticlesController@doBidding");

    Route::get("/auctions/price/{category}","FilterController@price");
    Route::get("/auctions/style/{stylesort}","FilterController@style");
    Route::get("/auctions/era/{era}","FilterController@era");
    Route::get("/auctions/ending/{ending}","FilterController@ending");
});