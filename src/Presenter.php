<?php
namespace dominikpn\Presenter;



abstract class Presenter
{
    protected $methodCasts = [];
    protected $propertyCasts = [];

    public function addMethodCast(string $methodName, $bind)
    {
        $this->methodCasts[$methodName] = $bind;
    }

    public function addPropertyCast(string $propertyName, $bind)
    {
        $this->propertyCasts[$propertyName] = $bind;
    }

    public function __call($name, $arguments)
    {
        if($this->checkIfMethodExists($name))
        {
            if($this->isFunction($this->methodCasts[$name]))
            {
                array_unshift($arguments,$this);
                return call_user_func_array($this->methodCasts[$name],$arguments);
            }
            return $this->methodCasts[$name];
        }
        return $this->defaultValue($name);
    }

    public function __get($name)
    {
        if($this->checkIfPropertyExists($name))
        {
            if($this->isFunction($this->propertyCasts[$name]))
            {
                return call_user_func_array($this->propertyCasts[$name],[$this]);
            }
            return $this->propertyCasts[$name];
        }
        return $this->defaultValue($name);
    }

    protected function defaultValue(string $methodOrPropertyName)
    {
        return null;
    }

    private function checkIfPropertyExists(string $propertyName)
    {
        return array_key_exists($propertyName,$this->propertyCasts);
    }

    private function checkIfMethodExists(string $methodName)
    {
        return array_key_exists($methodName,$this->methodCasts);
    }

    private function isFunction($check)
    {
        return is_callable($check);
    }
}