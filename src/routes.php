<?php

Route::filter('backlogFilter', 'Hidiyo\Thepanel\Filters\Backlog');

Route::get('/', array('uses' => 'Hidiyo\Thepanel\Controllers\FrontpageController@getIndex'));
Route::controller('thepanel'	, 'Hidiyo\Thepanel\Controllers\BacklogController');
Route::controller('frontpage'	, 'Hidiyo\Thepanel\Controllers\FrontpageController');
Route::controller('password'	, 'Hidiyo\Thepanel\Controllers\RemindersController');
Route::controller('user'		, 'Hidiyo\Thepanel\Controllers\UserController');
Route::controller('bookmarklet'	, 'Hidiyo\Thepanel\Controllers\BookmarkletController');

/** Include IOC Bindings **/
include __DIR__.'/bindings.php';
