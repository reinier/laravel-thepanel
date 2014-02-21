<?php namespace Hidiyo\Thepanel\Accounts;
use Hidiyo\Thepanel\Core\EloquentBaseRepository;

class UserRepository extends EloquentBaseRepository implements UserInterface
{
    public function __construct( User $user )
    {
        $this->model = $user;
    }
}