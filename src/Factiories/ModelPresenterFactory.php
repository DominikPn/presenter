<?php


namespace dominikpn\Presenter\Factiories;


interface ModelPresenterFactory
{
    public function create(string $class, $model, array $data = []);
}