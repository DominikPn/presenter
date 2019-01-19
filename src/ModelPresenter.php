<?php
namespace dominikpn\Presenter;


use dominikpn\Presenter\Exceptions\InvalidModelType;

abstract class ModelPresenter
{
    protected $model = null;

    public function setModel($model)
    {
        if(!$this->isValidType($model)) throw new InvalidModelType();
        $this->model = $model;
    }

    protected function isValidType($model)
    {
        return get_class($model) === $this->modelType();
    }

    abstract protected function modelType():string;
}