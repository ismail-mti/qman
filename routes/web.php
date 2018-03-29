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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questionair', 'QuestionairController@index')->name('questionair');
Route::get('/add_questionair', 'QuestionairController@addEditQuestionair');
Route::post('/save_questionair', 'QuestionairController@saveQuestionair');
Route::get('/edit_questionair/{qr_id}', ['uses' =>'QuestionairController@addEditQuestionair'])->name('edit_questionair');
Route::get('/del_questionair/{qr_id}', 'QuestionairController@delQuestionair')->name('del_questionair');

Route::get('/question/add/{qr_id}', 'QuestionController@create')->name('add_question');
Route::post('/save_question', 'QuestionController@saveQuestion');

//Route::resource('questions', 'QuestionController');