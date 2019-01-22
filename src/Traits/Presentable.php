<?php
namespace dominikpn\Presenter\Traits;


use dominikpn\Presenter\Factiories\ModelPresenterFactory;
use dominikpn\Presenter\Factiories\SimpleModelPresenterFactory;

trait Presentable
{
    protected $presenter;
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
        return new SimpleModelPresenterFactory();
    }
}