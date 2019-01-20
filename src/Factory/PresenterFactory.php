<?php
namespace dominikpn\Presenter\Factory;

use dominikpn\Presenter\Presenter;

Interface PresenterFactory
{
    public function create():Presenter;
}