<?php
namespace dominikpn\Presenter\Builder;


use dominikpn\Presenter\Exceptions\PresenterNotDefined;
use dominikpn\Presenter\Factory\PresenterFactory;
use dominikpn\Presenter\Factory\StandardFactory;
use dominikpn\Presenter\Presenter;

class Builder
{
    protected $presenter = null;
    protected $currentMethod = null;
    protected $currentProperty = null;

    public function createFrom(string $class, PresenterFactory $factory = null)
    {
        if($factory == null) $factory = new StandardFactory();
        $this->presenter = $factory->create($class);

        return $this;
    }

    public function presenter(Presenter $presenter)
    {
        $this->presenter = $presenter;
        return $this;
    }

    public function whenCall(string $methodName)
    {
        $this->currentMethod = $methodName;
        $this->clearCurrentProperty();
        return $this;
    }

    public function whenGet(string $propertyName)
    {
        $this->currentProperty = $propertyName;
        $this->clearCurrentMethod();
        return $this;
    }

    public function give($mixed)
    {
        $this->validatePresenter();

        if($this->currentMethod !== null)
            $this->presenter->addMethodCast($this->currentMethod,$mixed);
        if($this->currentProperty !== null)
            $this->presenter->addPropertyCast($this->currentProperty,$mixed);

        $this->clearBoth();
        return $this;
    }

    public function get()
    {
        $this->validatePresenter();

        return $this->presenter;
    }

    private function clearCurrentMethod()
    {
        $this->currentMethod = null;
    }

    private function clearCurrentProperty()
    {
        $this->currentProperty = null;
    }

    private function clearBoth()
    {
        $this->clearCurrentProperty();
        $this->clearCurrentMethod();
    }

    private function validatePresenter()
    {
        if($this->presenter === null)
            throw new PresenterNotDefined();
    }

}