<?php namespace Hidiyo\Thepanel\Links;
use Hidiyo\Thepanel\Core\EloquentBaseRepository;
use DB;

class LinksRepository extends EloquentBaseRepository implements LinksInterface
{
    public function __construct( Links $links )
    {
        $this->model = $links;
    }

    public function getAllByDateAsc()
    {
        return $this->model->orderBy('created_at','asc')->get();
    }

    public function getAllByDateDesc()
    {
        return $this->model->orderBy('created_at','desc')->get();
    }

    public function getAllFrontpage()
    {
        return $this->model->published()->with('user', 'votes')->orderBy('last_vote_date','desc')->get(array('all_the_votes' => DB::raw('*, (SELECT MAX(created_at) FROM votes WHERE links.id = votes.link_id) AS last_vote_date')));
    }
}