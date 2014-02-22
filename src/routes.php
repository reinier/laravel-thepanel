<?php

Route::controller('thepanel'	, 'Hidiyo\Thepanel\Controllers\BacklogController');
Route::controller('frontpage'	, 'Hidiyo\Thepanel\Controllers\FrontpageController');
Route::controller('password'	, 'Hidiyo\Thepanel\Controllers\RemindersController');
Route::controller('user'		, 'Hidiyo\Thepanel\Controllers\UserController');

/** Include IOC Bindings **/
include __DIR__.'/bindings.php';