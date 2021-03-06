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

Route::get('/', 'CandidateController@list')->name('candidate.list');
Route::post('/candidates-import', 'CandidateController@candidatesImport')->name('candidate.import');
Route::get('/candidates-export{type}', 'CandidateController@candidatesExport')->name('candidate.export');
Route::post('/job-import', 'JobController@jobsImport')->name('job.import');
Route::get('/import', 'CandidateController@list')->name('candidate.list');
