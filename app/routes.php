<?php

// Administration
Route::group(array('before' => 'admin'), function()
{
	// Sections
	Route::resource('sections', 'SectionController');

	// Catégories
	Route::post('categories/show', 'CategorieController@postShow');
	Route::resource('categories', 'CategorieController');

	// Utilisateurs
	Route::resource('users', 'UserController');

	// Accueil de l'administration
	Route::get('admin', array('as' => 'admin', function(){return View::make('backend.accueil');}));
});

// Gestion des articles
Route::group(array('before' => 'redac'), function()
{
	Route::group(array('prefix' => 'articles'), function()
	{
		Route::post('show-cat', 'ArticleController@postShowCat');
		Route::post('show-sec', 'ArticleController@postShowSec');
		Route::get('create/{categorie_id}', 'ArticleController@getCreate');
	});
	
	Route::resource('articles', 'ArticleController');	
	
	// File manager
	Route::get('filemanager/show/{x?}', function(){return View::make('backend.filemanager');});
});

// Frontend
Route::controller('pages', 'PageController');
Route::controller('auth', 'AuthController');
Route::controller('nav', 'NavController');
Route::get('/', array('as' => 'home', 'uses' => 'PageController@getIndex'));

// URL inconnue
App::missing(function($exception){return Response::view('error.404', array(), 404);});


