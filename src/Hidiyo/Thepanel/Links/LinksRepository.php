<?php namespace Hidiyo\Thepanel\Links;
use Hidiyo\Thepanel\Core\EloquentBaseRepository;
use DB, Datetime;

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

    // @TODO Split into smaller chunks of functions/classes
    public function getAllFrontpageFormatted()
    {
        $items = $this->getAllFrontpage();

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
                $votes          = array();
                $vote_dates     = array();
                foreach ($link->votes as $vote) {
                    
                    if($link->user->username == $vote->user->username)
                    {
                        $size = '48';   
                    } else {
                        $size = '32';
                    }

                    $gravatar = '<img src="http://www.gravatar.com/avatar/'.md5(strtolower(trim($vote->user->email))).'?s='.$size.'&d=identicon" title="'.$vote->user->name.'" class="img-circle">';
                    $votes[] = $gravatar;

                    $vote_dates[] = $vote->created_at;
                }
            }

            $link->voted = implode(' ', $votes);

            $max_vote_date = max($vote_dates);
            $link->last_vote = $max_vote_date->diffForHumans();


            $links[] = $link;
        }

        if(empty($links)){
            $links = '';
        }

        return $links;
    }

    public function getAllBacklog($sort='')
    {
        if($sort == 'votes')
        {
            $links = $this->model->backlog()->with('user', 'votes')->orderBy('vote_count','desc')->get(array('count_the_votes' => DB::raw('*, (SELECT COUNT(*) FROM votes WHERE links.id = votes.link_id) AS vote_count')));
        } else {
            $links = $this->model->backlog()->orderBy('created_at','desc')->with('user', 'votes')->get();
        }

        return $links;
    }
}