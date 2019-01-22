<?php
namespace dominikpn\Presenter;

use dominikpn\Presenter\Exceptions\InvalidModelType;

abstract class ModelPresenter extends Presenter
{
    protected $model = null;
    protected $checkType = true;

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
}