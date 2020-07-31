<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth Routes
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');
Route::get('/authuser', 'AuthController@me');

//Posting Routes
Route::post('/postjob', 'PostingController@store');
Route::put('/updatejob/{id}', 'PostingController@updatejob');
Route::delete('/deletejob/{id}', 'PostingController@destroy');
Route::get('/jobs', 'PostingController@index');
Route::get('/job/{id}', 'PostingController@show');

//ApplyJobs Route
Route::post('/applyjob', 'ApplyJobController@store');
Route::get('/myappliedjob/{id}', 'ApplyJobController@applied');
// Route::post('/applyjob', 'ApplyJobController@store');

//Manager Route
Route::put('/updatemanager/{id}', 'ManagersController@update');

//Applicant Route
Route::put('/applicant/{id}', 'ApplicantController@update');

//Contactus 4 Route Mail
Route::post('/contactus', 'ContactusController@store');

//News 4 Route Mail
Route::post('/newsfeeds', 'NewFeedsController@store');

//test
Route::get('/testmailinfo', 'NewFeedsController@test');

