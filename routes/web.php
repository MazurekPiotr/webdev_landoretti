<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localize' ]], function()
{
    Auth::routes();
    Route::get('/',     function()
    {
        return view('welcome');
    });
    Route::group(['middleware' => 'auth'], function ()
    {
        Route::get('auctionbidding/{id}',"ArticlesController@showbiddingForm");
        Route::post('bid',"ArticlesController@doBidding");
        Route::get(LaravelLocalization::transRoute('routes.myauctions'), 'ArticlesController@myAuctions');
        Route::get('auctionbidding/{id}',"ArticlesController@showbiddingForm");
        Route::post('bid',"ArticlesController@doBidding");
        Route::get('editBidding/{id}',"ArticlesController@showEditBidding");
        Route::post('editBid',"ArticlesController@editBidding");


        Route::post('bid',"ArticlesController@doBidding");

        Route::get('/buynow/{id}',"ArticlesController@buyNow");
        Route::get('/mywatchlist', "ArticlesController@showWatchlist");
        Route::get('/addtowatchlist/{id}', 'ArticlesController@addToWatchList');
    });

    Route::resource(LaravelLocalization::transRoute('routes.auctions'), 'ArticlesController');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::get("/auctions/price/{category}","FilterController@price");
    Route::get("/auctions/style/{stylesort}","FilterController@style");
    Route::get("/auctions/era/{era}","FilterController@era");
    Route::get("/auctions/ending/{ending}","FilterController@ending");
});