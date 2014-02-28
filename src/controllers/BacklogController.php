<?php namespace Hidiyo\Thepanel\Controllers;
use Hidiyo\Thepanel\Links\LinksInterface;
use Hidiyo\Thepanel\Votes\VotesInterface;
use Illuminate\Support\MessageBag;
use View, Input, Redirect, Auth;

class BacklogController extends BaseController {

	public function __construct( LinksInterface $links, VotesInterface $votes )
    {
        $this->links = $links;
        $this->votes = $votes;
        parent::__construct();
    }

    public function getIndex()
    {
		return View::make('thepanel::backlog.index')->with( 'items' , $this->links->getAllBacklog() );
    }

	public function getAdd()
	{
		return View::make('thepanel::backlog.add');
	}

	public function postAdd()
	{
		$newLink = $this->links->getNew( Input::all() );
		$valid = $newLink->isValid( Input::all() );

		if( !$valid )
		{
			return Redirect::to( 'thepanel/add' )->with( 'errors' , $newLink->getErrors() )->withInput();
		}

		$newLink->user_id = Auth::user()->id;
		$newLink->save();

		$newVote = $this->votes->getNew();
		$newVote->user_id = Auth::user()->id;

		$newLink->votes()->save($newVote);

		return Redirect::to( 'thepanel' )->with('success', new MessageBag( array('Link created') ) );
	}
}
