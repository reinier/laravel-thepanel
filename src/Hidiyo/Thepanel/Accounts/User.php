<?php namespace Hidiyo\Thepanel\Accounts;
use Hidiyo\Thepanel\Core\EloquentBaseModel;
use Illuminate\Auth\UserInterface as LaravelUserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Hash;

class User extends EloquentBaseModel implements LaravelUserInterface, RemindableInterface
{

    protected $table    = 'users';
    protected $hidden = array('password');

    public function links()
    {
        return $this->hasMany('Hidiyo\Thepanel\Links\Links','link_id');
    }

    public function votes()
    {
        return $this->hasMany('Hidiyo\Thepanel\Votes\Votes','user_id');
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

}