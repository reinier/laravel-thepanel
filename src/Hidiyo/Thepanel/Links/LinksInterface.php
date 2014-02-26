<?php namespace Hidiyo\Thepanel\Links;

interface LinksInterface {

    public function getAllFrontpage();
    public function getAllBacklog($sort='');
}