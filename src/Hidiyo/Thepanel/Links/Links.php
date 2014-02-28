<?php namespace Hidiyo\Thepanel\Links;
use Hidiyo\Thepanel\Core\EloquentBaseModel;
use Config, DateTime;

class Links extends EloquentBaseModel {
	protected $table = 'links';
	protected $softDelete = true;
    protected $fillable = array('title', 'url', 'kind', 'reason');

    protected $validationRules = [
        'title' => 'required',
        'url' => 'required'
    ];

	public function user()
    {
        return $this->belongsTo('Hidiyo\Thepanel\Accounts\User');
    }

    public function votes()
    {
        return $this->hasMany('Hidiyo\Thepanel\Votes\Votes','link_id');
    }

    public function scopeBacklog($query)
    {
        $maxvotes = Config::get('thepanel::site.maxvotes');
        $old_date = new DateTime('tomorrow -1 week');
        return $query->has('votes', '<', $maxvotes)->where('created_at', '>', $old_date);
    }

    public function scopePublished($query)
    {
        $maxvotes = Config::get('thepanel::site.maxvotes');
        return $query->has('votes', '>=', $maxvotes)->take(25);
    }
}