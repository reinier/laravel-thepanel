<?php namespace Hidiyo\Thepanel\Controllers;
use View, Input, Lang, Redirect;

class AccountController extends BaseController {

	public function getRegister()
	{
		return View::make('thepanel::account.register');
	}

	public function postRegister()
	{
		Input::flash();
		return Redirect::to('/account/register')->withInput();
	}
}