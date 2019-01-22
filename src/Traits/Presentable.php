<?php
namespace dominikpn\Presenter\Traits;


use dominikpn\Presenter\Factories\FactoryProvider;
use dominikpn\Presenter\Factories\ModelPresenterFactory;

trait Presentable
{
    protected $presenterInstance;

    public function presenter()
    {
        if($this->presenterInstance == null){
            $this->presenterInstance = $this->presenterFactory()->create($this->presenter,$this);
            return $this->presenterInstance;
        }
        return $this->presenterInstance;
    }

    protected function presenterFactory():ModelPresenterFactory
    {
        return FactoryProvider::getDefaultFactory();
    }
}