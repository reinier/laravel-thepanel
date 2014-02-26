<?php namespace Hidiyo\Thepanel\Controllers;
use Hidiyo\Thepanel\Accounts\UserInterface;
use Illuminate\Support\MessageBag;
use View, Input, Lang, Redirect, Validator, Str, Hash, Auth;

class UserController extends BaseController {

	protected $validateWithInput = true;

    public function __construct( UserInterface $users )
    {
        $this->model = $users;
        parent::__construct();
    }

	public function getNew()
	{
		return View::make('thepanel::user.new');
	}

	public function postNew()
	{
	    $record = $this->model->getNew( Input::all() );
        $valid = $record->isValid( Input::all() );

        if( !$valid )
        {
            return Redirect::to( 'user/new' )->with( 'errors' , new MessageBag( array( $record->getErrors() ) ) )->withInput();
        }

        $record->publichash		= Str::random(16); // @TODO check DB to make unique
        $record->password 		= Hash::make($record['password']);
        $record->bio 			= 'No information yet';

        $record->save();

        // @TODO send mail with activation link

        return Redirect::to( 'user/new' )->with('success', new MessageBag( array('User created') ) );

	}

    function getEdit()
    {
        return View::make('thepanel::user.edit');
    }
}