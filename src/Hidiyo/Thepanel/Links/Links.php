<?php namespace Hidiyo\Thepanel\Links;
use Hidiyo\Thepanel\Core\EloquentBaseModel;

class Links extends EloquentBaseModel {
	protected $table = 'links';
	protected $softDelete = true;

	public function user()
    {
        return $this->belongsTo('User');
    }

    public function votes()
    {
        return $this->hasMany('Vote');
    }

    // public function scopeBacklog($query)
    // {
    //     $maxvotes = Config::get('site.maxvotes');
    //     $old_date = new DateTime('tomorrow -1 week');
    //     return $query->has('votes', '<', $maxvotes)->where('created_at', '>', $old_date);
    // }

    // public function scopePublished($query)
    // {
    //     $maxvotes = 3;
    //     return $query->has('votes', '>=', $maxvotes)->take(25);
    // }
}