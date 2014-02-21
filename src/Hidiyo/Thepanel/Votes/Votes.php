<?php namespace Hidiyo\Thepanel\Votes;
use Hidiyo\Thepanel\Core\EloquentBaseModel;

class Votes extends EloquentBaseModel {
	protected $table = 'votes';
    
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function link()
    {
        return $this->belongsTo('Link');
    }
}