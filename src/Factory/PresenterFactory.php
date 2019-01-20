<?php
namespace dominikpn\Presenter\Factory;

use dominikpn\Presenter\Presenter;

Interface PresenterFactory
{
    public function create(string $class,$model = null):Presenter;
}