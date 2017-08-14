<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: accept,content-type,x-xsrf-token');
header('Content-Type: application/json');
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


//insert author
Route::post('author/create',  'AuthorController@createAuthor');

//insert Article
Route::post('article/create', 'ArticleController@createArticle');

//Get all articles
Route::get('article/getall', 'ArticleController@getAllArticle');

//Get selected articles
Route::get('article/getarticle/{id}', 'ArticleController@getArticle');

//Update Article
Route::post('article/update', 'ArticleController@updateArticle');

//Delete Article
Route::get('article/delete/{id}', 'ArticleController@deleteArticle');
