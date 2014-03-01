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

    public function getLinkByIdWithVotes($id)
    {
        // I tried to use ->find($id) here, but it returns the wrong votes…
        return $this->model->where('id', $id)->with('votes')->first();
    }

    public function getAugmentedLinkByIdWithVotes($id)
    {
        $link = $this->getLinkByIdWithVotes($id);
        $augmentedLink = $this->augmentLinks(array($link));
        return $augmentedLink[0];
    }

    public function getLinkByUrl($url)
    {
        return $this->model->where('url', 'LIKE', $url)->get();
    }

    public function augmentLinks($items)
    {
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

            if(is_array($vote_dates) AND !empty($vote_dates))
            {
                $max_vote_date = max($vote_dates);
                $link->last_vote = $max_vote_date->diffForHumans();
            } else {
                $link->last_vote = 'now';
            }

            $link->user_has_already_voted = $user_has_already_voted;
            $links[] = $link;
        }

        if(empty($links)){
            return '';
        }

        return $links;
    }
}
