<?php

Route::controller('thepanel', 'Hidiyo\Thepanel\Controllers\BacklogController');
Route::controller('frontpage', 'Hidiyo\Thepanel\Controllers\FrontpageController');
Route::controller('password', 'Hidiyo\Thepanel\Controllers\RemindersController');

/** Include IOC Bindings **/
include __DIR__.'/bindings.php';