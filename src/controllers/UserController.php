<?php namespace Hidiyo\Thepanel\Controllers;
use Hidiyo\Thepanel\Accounts\UserInterface;
use Illuminate\Support\MessageBag;
use View, Input, Lang, Redirect, Validator, Hash, Auth, User, Mail;

class UserController extends BaseController {

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
            return Redirect::to( 'user/new' )->with( 'errors' , $record->getErrors() )->withInput();
        }

        $record->publichash		= str_random(); // @TODO check DB to make unique
        $record->password 		= Hash::make($record['password']);
        $record->bio 			= 'No information yet';

        $record->save();

        // Mail activation link to this human being
        $data['hash'] = $record->publichash;
        Mail::send('thepanel::emails.activate', $data, function($message) use ($record)
        {
            $message->to($record->email, $record->name)->subject('Activate your account');
        });

        return Redirect::to( 'user/new' )->with('success', new MessageBag( array('User created') ) );

	}

    function getEdit()
    {
        return View::make('thepanel::user.edit');
    }

    function postEdit($id)
    {
        if($id != Auth::user()->id)
        {
            return Redirect::to( 'user/edit' )->with( 'errors' , new MessageBag( array( 'You can only edit your own account' ) ) )->withInput();
        }

        $record = $this->model->requireById( $id );
        $record->name   = Input::get('name');
        $record->bio    = Input::get('bio');
        $record->save();

        return Redirect::to( 'user/edit' )->with( 'success' , new MessageBag( array( 'Your account has been updated' ) ) );
    }
}
