<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
|---------------------------------------------------------------------------
| Authors routs
|---------------------------------------------------------------------------
*/
	//create new author
    Route::post('author', 'AuthorController@store');

/*
|---------------------------------------------------------------------------
| Articles routs
|---------------------------------------------------------------------------
*/    
    //get all articles
    Route::get('articles', 'ArticleController@index');
    //get one article
    Route::get('articles/{article}', 'ArticleController@show');
    //create new article
    Route::post('articles', 'ArticleController@store');
    //update article
    Route::put('articles/{article}', 'ArticleController@update');
    //delete article
    Route::delete('articles/{article}', 'ArticleController@delete');
