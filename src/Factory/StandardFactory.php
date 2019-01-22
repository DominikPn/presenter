<?php
namespace dominikpn\Presenter\Factory;


use dominikpn\Presenter\Presenter;

class StandardFactory implements PresenterFactory
{
    public function create(string $class): Presenter
    {
        $presenter = new $class();
        return $presenter;
    }
}