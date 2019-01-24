<?php
namespace dominikpn\Presenter\Traits;


use dominikpn\Presenter\Factories\FactoryProvider;
use dominikpn\Presenter\Factories\ModelPresenterFactory;
use dominikpn\Presenter\ModelPresenter;

trait Presentable
{
    protected $presenterInstance;

    public function presenter(string $presenterClass = null)
    {
        if($presenterClass != null){
            $presenter = $this->presenterFactory()->create($presenterClass,$this);
            return $presenter;
        }
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