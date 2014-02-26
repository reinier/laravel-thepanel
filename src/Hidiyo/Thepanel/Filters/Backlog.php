<?php namespace Hidiyo\Thepanel\Filters;
use Auth, Redirect, Config;

class Backlog {
    public function filter()
    {
        if ( Auth::guest() )
            return Redirect::guest('/frontpage/login');
    }
}