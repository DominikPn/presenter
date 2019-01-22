<?php


namespace dominikpn\Presenter\Factories;


interface ModelPresenterFactory
{
    public function create(string $class, $model, array $data = []);
}