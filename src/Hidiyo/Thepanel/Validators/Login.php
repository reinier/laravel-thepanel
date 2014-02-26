<?php namespace Hidiyo\Thepanel\Validators;
use Hidiyo\Thepanel\Abstracts\ValidatorBase;

class Login extends ValidatorBase
{

    protected $rules = array(
        'email'         =>  'required|email',
        'password'      =>  'required'
    );

}