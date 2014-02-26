<?php namespace Hidiyo\Thepanel\Links;
use Hidiyo\Thepanel\Core\EloquentBaseRepository;
use DB, Datetime, Auth;

class LinksRepository extends EloquentBaseRepository implements LinksInterface
{
    public function __construct( Links $links )
    {
        $this->model = $links;
    }

    public function getAllFrontpage()
    {
        $links = $this->model->published()->with('user', 'votes')->orderBy('last_vote_date','desc')->get(array('all_the_votes' => DB::raw('*, (SELECT MAX(created_at) FROM votes WHERE links.id = votes.link_id) AS last_vote_date')));
        return $this->augmentLinks($links);
    }

    public function getAllBacklog($sort='')
    {
        if($sort == 'votes')
        {
            $links = $this->model->backlog()->with('user', 'votes')->orderBy('vote_count','desc')->get(array('count_the_votes' => DB::raw('*, (SELECT COUNT(*) FROM votes WHERE links.id = votes.link_id) AS vote_count')));
        } else {
            $links = $this->model->backlog()->orderBy('created_at','desc')->with('user', 'votes')->get();
        }

        return $this->augmentLinks($links);
    }

    public function augmentLinks($items)
    {
        if(empty($items)){
            return '';
        }

        foreach ($items as $link)
        {
            $date = $link->created_at->diffForHumans();
            $link->date_ago = $date;
            
            /* Move to function */
            $link->domain = parse_url($link->url, PHP_URL_HOST);
            if(substr($link->domain, 0, 4) == 'www.'){
                $link->domain = substr($link->domain, 4);
            }

            if($link->votes)
            {
                $vote_dates     = array();
                $user_has_already_voted = FALSE;
                
                foreach ($link->votes as $vote) {
                    $vote_dates[] = $vote->created_at;
                    if (Auth::check())
                    {
                        if(Auth::user()->username == $vote->user->username)
                        {
                            $user_has_already_voted = TRUE;
                        }
                    }
                }
            }

            $max_vote_date = max($vote_dates);
            $link->last_vote = $max_vote_date->diffForHumans();

            $link->user_has_already_voted = $user_has_already_voted;
            $links[] = $link;
        }

        return $links;
    }
}