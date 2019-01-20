<?php


namespace dominikpn\Presenter\Factory;


use dominikpn\Presenter\Presenter;

class PresenterFromString implements PresenterFactory
{
    private $class = null;
    private $model = null;

    public function __construct(string $class,$model)
    {
        $this->class=$class;
        $this->model = $model;
    }

    public function create(): Presenter
    {
        $class = $this->class;
        $presenter = new $class();

        $presenter->setModel($this->model);
        return $presenter;
    }
}