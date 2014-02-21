<?php

Route::controller('thepanel', 'Hidiyo\Thepanel\Controllers\BacklogController');
Route::controller('frontpage', 'Hidiyo\Thepanel\Controllers\FrontpageController');

/** Include IOC Bindings **/
include __DIR__.'/bindings.php';