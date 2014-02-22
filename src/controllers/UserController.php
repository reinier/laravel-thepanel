<?php namespace Hidiyo\Thepanel\Controllers;
use Hidiyo\Thepanel\Accounts\UserInterface;
use View, Input, Lang, Redirect, Validator, Str, Hash;

class UserController extends BaseController {

	protected $validateWithInput = true;

    public function __construct( UserInterface $users )
    {
        $this->model = $users;
        parent::__construct();
    }

	public function getRegister()
	{
		return View::make('thepanel::user.register');
	}

	public function postRegister()
	{
	    $record = $this->model->getNew( Input::all() );
        $valid = $record->isValid( Input::all() );

        if( !$valid )
        {
        	Input::flash();
            return Redirect::to( 'user/register' )->with( 'errors' , $record->getErrors() )->withInput();
        }

        $now = date('Y-m-d H:i:s');

        $record->publichash		= Str::random(16); // @TODO make unique
        $record->password 		= Hash::make($record['password']);
        $record->bio 			= 'No information yet';
		$record->activated		= 0;
		$record->created_at 	= $now;
		$record->updated_at 	= $now;

        $record->save();
        return Redirect::to( 'user/register' )->with( 'status' , 'User created' );
	}
}