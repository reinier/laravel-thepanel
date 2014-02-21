<?php namespace Hidiyo\Thepanel\Controllers;
use Hidiyo\Thepanel\Links\LinksInterface;
use View;

class BacklogController extends BaseController {

	public function __construct( LinksInterface $links )
    {
        $this->model = $links;
        parent::__construct();
    }

    public function getIndex()
    {
        return View::make('thepanel::backlog')->with( 'items' , $this->model->getAll() );
    }
}