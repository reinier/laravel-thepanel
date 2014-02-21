<?php namespace Hidiyo\Thepanel\Votes;
use Hidiyo\Thepanel\Core\EloquentBaseModel;

class Votes extends EloquentBaseModel {
	protected $table = 'votes';
    
    public function user()
    {
        return $this->belongsTo('Hidiyo\Thepanel\Accounts\User');
    }

    public function link()
    {
        return $this->belongsTo('Hidiyo\Thepanel\Links\Links');
    }
}