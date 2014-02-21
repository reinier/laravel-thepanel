<?php namespace Hidiyo\Thepanel\Links;
use Hidiyo\Thepanel\Core\EloquentBaseRepository;

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
        $this->model->orderBy('created_at','desc')->get();
    }
}