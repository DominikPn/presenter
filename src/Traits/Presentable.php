<?php
namespace dominikpn\Presenter\Traits;


trait Presentable
{
    protected $presenter = null;

    public function presenter()
    {
        return new ($this->presenter)($this);
    }
}