<?php namespace Hidiyo\Thepanel\Controllers;
use View;

class BacklogController extends BaseController {

    public function getIndex()
    {
        return View::make('thepanel::backlog');
    }
}