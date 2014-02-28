<?php namespace Hidiyo\Thepanel\Votes;
use Hidiyo\Thepanel\Core\EloquentBaseRepository;

class VotesRepository extends EloquentBaseRepository implements VotesInterface
{
    public function __construct( Votes $votes )
    {
        $this->model = $votes;
    }
}