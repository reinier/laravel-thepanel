<?php namespace Hidiyo\Thepanel\Core;
use Hidiyo\Thepanel\Core\Exceptions\NoValidationRulesFoundException;
use Validator, Eloquent, ReflectionClass, Input;

class EloquentBaseModel extends Eloquent
{
    protected $validationRules = [];
    protected $validator;

    public function isValid( $data = array() )
    {
        if ( ! isset($this->validationRules) or empty($this->validationRules)) {
            throw new NoValidationRulesFoundException('no validation rules found in class ' . get_called_class());
        }

        if( !$data )
            $data = $this->getAttributes();

        $this->validator = Validator::make( $data , $this->validationRules );

        return $this->validator->passes();
    }

    public function getErrors()
    {
        return $this->validator->errors();
    }

    public function getTableName()
    {
        return $this->table;
    }
}