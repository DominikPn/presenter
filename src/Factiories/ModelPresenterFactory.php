<?php


namespace dominikpn\Presenter\Factiories;


class ModelPresenterFactory implements Factory
{
    public function create(string $class, array $data = [])
    {
        if(isset($data['model']))
            return new $class($data['model']);
        return null;
    }
}