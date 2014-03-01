<?php namespace Hidiyo\Thepanel\Controllers;
use Illuminate\Support\MessageBag;
use View, Input, Auth;

class BookmarkletController extends BaseController {

	public function getIndex()
	{
		return View::make('thepanel::bookmarklet.index')->with('publichash',Auth::user()->publichash);
	}

	public function getSource()
	{
		return View::make('thepanel::bookmarklet.source')->with('user',Input::get('user'));
	}

}
