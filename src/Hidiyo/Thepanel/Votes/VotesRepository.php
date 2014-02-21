<?php namespace Hidiyo\Thepanel\Votes;
use Hidiyo\Thepanel\Core\EloquentBaseRepository;

class VotesRepository extends EloquentBaseRepository implements VotesInterface
{
    public function __construct( Links $vote )
    {
        $this->model = $votes;
    }
}