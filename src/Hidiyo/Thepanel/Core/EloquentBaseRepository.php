<?php namespace Hidiyo\Thepanel\Core;
use Hidiyo\Thepanel\Core\Exceptions\EntityNotFoundException;

class EloquentBaseRepository
{
	protected $model;

    public function __construct($model = null)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getNew( $attributes = array() )
    {
        return $this->model->newInstance($attributes);
    }
}