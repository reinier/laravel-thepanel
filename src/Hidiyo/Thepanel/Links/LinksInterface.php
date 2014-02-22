<?php namespace Hidiyo\Thepanel\Links;

interface LinksInterface {

    public function getAllByDateAsc();
    public function getAllByDateDesc();
    public function getAllFrontpage();
    public function getAllBacklog($sort='');
}