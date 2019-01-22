<?php


namespace dominikpn\Presenter\Factories;


class SimpleModelPresenterFactory implements ModelPresenterFactory
{
    public function create(string $class,$model, array $data = [])
    {
        return new $class($model);
    }
}