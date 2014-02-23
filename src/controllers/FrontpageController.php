<?php namespace Hidiyo\Thepanel\Controllers;
use Hidiyo\Thepanel\Links\LinksInterface;
use View;

class FrontpageController extends BaseController {

	public function __construct( LinksInterface $links )
    {
        $this->model = $links;
        parent::__construct();
    }

    public function getIndex()
    {
		return View::make('thepanel::frontpage.index')->with( 'items' , $this->model->getAllFrontpageFormatted() );
    }
}