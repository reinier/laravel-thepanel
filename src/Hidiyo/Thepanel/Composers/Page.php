<?php
namespace Hidiyo\Thepanel\Composers;
use Illuminate\Support\MessageBag;
use Auth, Session, Config, App;

class Page{
    public function compose($view)
    {
        $view->with('user', Auth::user())
             ->with('success', Session::get('success' , new MessageBag ) );
    }
}