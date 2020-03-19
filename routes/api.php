<?php

Route::group(['prefix' => 'payment'], function () {
    //mpesa callback urls
    Route::get('/register-url', 'Api\v1\mpesa\MpesaController@register');
    Route::any('/validate', 'Api\v1\mpesa\MpesaController@validateTransaction');
    Route::any('/confirm', 'Api\v1\mpesa\MpesaController@confirmTransaction');

    Route::post('/pay', 'Api\v1\mpesa\MpesaController@pay');
});


Route::group(['prefix' => 'v1'], function () {
    //booking routers
    Route::get('/bookings', 'Api\v1\booking\BookingController@index');
    Route::get('/bookings/{booking}', 'Api\v1\booking\BookingController@show');
    Route::post('/bookings', 'Api\v1\booking\BookingController@store');
    Route::put('/bookings/{booking}', 'Api\v1\booking\BookingController@update');
    Route::delete('/bookings/{id}', 'Api\v1\booking\BookingController@destroy');

    //truck routers
    Route::get('/trucks', 'Api\v1\truck\TruckController@index');
    Route::get('/trucks/{id}', 'Api\v1\truck\TruckController@show');
    Route::post('/trucks', 'Api\v1\truck\TruckController@store');
    Route::put('/trucks/{id}', 'Api\v1\truck\TruckController@update');
    Route::delete('/trucks/{id}', 'Api\v1\truck\TruckController@destroy');

    //payment routers
    Route::get('/payments', 'Api\v1\payment\PaymentController@index');
    Route::post('/payments', 'Api\v1\payment\PaymentController@store');
});

Route::group(['prefix' => 'v1/auth'], function () {
    //authentication routes
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
