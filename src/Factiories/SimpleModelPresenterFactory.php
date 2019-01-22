<?php


namespace dominikpn\Presenter\Factiories;


class SimpleModelPresenterFactory implements ModelPresenterFactory
{
    public function create(string $class,$model, array $data = [])
    {
        return new $class($model);
    }
}