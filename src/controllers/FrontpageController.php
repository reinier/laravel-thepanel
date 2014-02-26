<?php namespace Hidiyo\Thepanel\Controllers;
use Hidiyo\Thepanel\Links\LinksInterface;
use Hidiyo\Thepanel\Validators\Login;
use Illuminate\Support\MessageBag;
use View, Auth, Redirect, Validator, Session, Input;

class FrontpageController extends BaseController {

	protected $whitelist = array(
        'getIndex',
        'getLogin',
        'getLogout',
        'postLogin',
        'getAbout'
    );

	public function __construct( LinksInterface $links )
    {
        $this->model = $links;
        parent::__construct();
    }

    public function getIndex()
    {
		return View::make('thepanel::frontpage.index')->with( 'items' , $this->model->getAllFrontpage() );
    }

    public function getAbout()
    {
		return View::make('thepanel::frontpage.about');
    }

    public function getLogin()
    {
        // If logged in, redirect to backlog
        if (Auth::check())
        {
            return Redirect::to('/thepanel');
        }

        return View::make('thepanel::frontpage.login');
    }

    public function postLogin()
    {
        $loginValidator = new Login( Input::all() );

        // Check if the form validates with success.
        if ( $loginValidator->passes() )
        {

            $loginDetails = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            // Try to log the user in.
            if ( Auth::attempt( $loginDetails ) )
            {
                $user = Auth::user();
                // $user->last_login = date('Y-m-d H:i:s');
                // $user->save();

                // Redirect to the users page.
                return Redirect::to( '/thepanel' )
                        ->with('success', new MessageBag( array('You have logged in successfully') ) );
            } else {
                // Redirect to the login page.
                return Redirect::to('/frontpage/login')
                            ->with('errors', new MessageBag( array( 'Invalid Email &amp; Password' ) ) );
            }
        }

        // Something went wrong.
        return Redirect::to('/frontpage/login')
                ->withErrors( $loginValidator->messages() )->withInput();
    }

    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('/frontpage/login')->with('success', new MessageBag(array('Succesfully logged out.')));
    }
}