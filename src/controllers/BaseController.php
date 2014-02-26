<?php namespace Hidiyo\Thepanel\Controllers;
use Illuminate\Routing\Controller;
use View, Config;

abstract class BaseController extends Controller{

	protected $whitelist = array();

    public function __construct()
    {
    	$this->beforeFilter( 'backlogFilter' , array('except' => $this->whitelist) );
    	$composed_views = array( 'thepanel::*' );
        View::composer($composed_views, 'Hidiyo\Thepanel\Composers\Page');
    }

}