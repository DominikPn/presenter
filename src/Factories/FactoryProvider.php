<?php


namespace dominikpn\Presenter\Factories;


class FactoryProvider
{
    public static function getDefaultFactory():ModelPresenterFactory
    {
       return new SimpleModelPresenterFactory();
    }
}