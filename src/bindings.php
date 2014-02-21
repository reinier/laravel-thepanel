<?php

// The Links Bindings
App::bind('Hidiyo\Thepanel\Links\LinksInterface', function(){
    return new Hidiyo\Thepanel\Links\LinksRepository( new Hidiyo\Thepanel\Links\Links );
});