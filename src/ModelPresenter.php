<?php
namespace dominikpn\Presenter;

use dominikpn\Presenter\Exceptions\InvalidModelType;
use Illuminate\Contracts\Support\Jsonable;

abstract class ModelPresenter extends Presenter implements Jsonable
{
    private CONST METHOD = 1;
    private CONST PROPERTY = 2;

    protected $model = null;
    protected $checkType = true;
    protected $toJson = [];

    public function __construct($model)
    {
        if(!$this->isValidType($model)) throw new InvalidModelType('Model must be instance of '.$this->modelType());
        $this->model = $model;
    }

    public function setModel($model)
    {
        if(!$this->isValidType($model)) throw new InvalidModelType('Model must be instance of '.$this->modelType());
        $this->model = $model;
    }

    private function isValidType($model)
    {
        return $this->checkType && get_class($model) == $this->modelType();
    }

    abstract protected function modelType():string;

    public function toJson($options = 0)
    {
        $buffer = [];

        foreach ($this->toJson as $name=>$type)
        {
            switch ($type)
            {
                case self::METHOD:
                    $buffer[$name] = $this->$name();
                    break;
                case self::PROPERTY:
                    $buffer[$name] = $this->$name;
                    break;
                default:
                    $buffer[$name] = $this->$name;
            }
        }

        return json_encode($buffer,$options);
    }

}