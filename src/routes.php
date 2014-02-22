<?php

Route::controller('thepanel', 'Hidiyo\Thepanel\Controllers\BacklogController');
Route::controller('frontpage', 'Hidiyo\Thepanel\Controllers\FrontpageController');
Route::controller('password', 'Hidiyo\Thepanel\Controllers\RemindersController');
Route::controller('account', 'Hidiyo\Thepanel\Controllers\AccountController');

/** Include IOC Bindings **/
include __DIR__.'/bindings.php';