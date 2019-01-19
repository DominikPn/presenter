<?php
namespace dominikpn\Presenter;


abstract class Presenter
{
    protected $methodCasts = [];
    protected $propertyCasts = [];

    public function addMethodCast(string $methodName, $bind){
        $this->methodCasts[$methodName] = $bind;
    }

    public function addPropertyCast(string $propertyName, $bind){
        $this->propertyCasts[$propertyName] = $bind;
    }
}