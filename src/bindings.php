<?php

App::bind('Hidiyo\Thepanel\Links\LinksInterface', function(){
    return new Hidiyo\Thepanel\Links\LinksRepository( new Hidiyo\Thepanel\Links\Links );
});

App::bind('Hidiyo\Thepanel\Accounts\UserInterface', function(){
    return new Hidiyo\Thepanel\Accounts\UserRepository( new Hidiyo\Thepanel\Accounts\User );
});

App::bind('Hidiyo\Thepanel\Votes\VotesInterface', function(){
    return new Hidiyo\Thepanel\Votes\VotesRepository( new Hidiyo\Thepanel\Votes\Votes );
});