<?php namespace Hidiyo\Thepanel\Links;

interface LinksInterface {
    public function getAllFrontpage();
    public function getAllBacklog($sort='');
    public function getLinkByIdWithVotes($id);
    public function getAugmentedLinkByIdWithVotes($id);
    public function getLinkByUrl($url);
}
