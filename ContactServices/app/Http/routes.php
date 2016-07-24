<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/ContactServices/opSendContact', 'SendContactController@opSendContact');

Route::get('/sendemail', function () {

    $data = array(
        'name' => "Mencoba Belajar Laravel"
    );

    Mail::send('email', $data, function ($message) {

        $message->from('pradhanywidityan@gmail.com', 'Learning Laravel');

        $message->to('pradhanywidityan@gmail.com')->subject('Learning Laravel test email');

    });

//    Mail::raw('coba', function ($message) {
//
//        $message->from('pradhanywidityan@gmail.com', 'Learning Laravel');
//
//        $message->to('pradhanywidityan@gmail.com')->subject('Learning Laravel test email');
//
//    });

    return "Your email has been sent successfully";

});