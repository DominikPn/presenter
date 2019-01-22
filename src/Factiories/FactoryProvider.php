<?php


namespace dominikpn\Presenter\Factiories;


class FactoryProvider
{
    public static function getDefaultFactory():ModelPresenterFactory
    {
       return new SimpleModelPresenterFactory();
    }
}