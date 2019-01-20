<?php
namespace dominikpn\Presenter\Factory;


use dominikpn\Presenter\Presenter;

class StandardFactory implements PresenterFactory
{
    public function create(string $class,$model = null): Presenter
    {
        $presenter = new $class();

        if($model != null)
            $presenter->setModel($model);

        return $presenter;
    }
}