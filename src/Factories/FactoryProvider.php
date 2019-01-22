<?php
namespace dominikpn\Presenter\Factories;

use Illuminate\Support\Facades\Config;

class FactoryProvider
{
    public static function getDefaultFactory():ModelPresenterFactory
    {
       $factoryClassNamespace = Config::get('modelPresenter.defaultFactory');
       $defaultFactory = new $factoryClassNamespace();
       return $defaultFactory;
    }
}