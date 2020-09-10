<?php

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

//index route
Route::get('/', 'EmailController@index')->name('index');

//contact-us
Route::get('contact', 'ContactController@getContact')->name('contact.index');
Route::post('contact', 'ContactController@saveContact')->name('conact.save.send');

//send mail-with make:mail
Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');

//send email to costomer-end with notification 
Route::post('/send', 'EmailController@send_email')->name('send_email');
//send custom to costomer-end with notification
Route::post('/send-custom', 'EmailController@send_custom')->name('custom_mail');

//auth route for login
Auth::routes();

//home module route
Route::get('/home', 'HomeController@index')->name('home');
