<?php


namespace dominikpn\Presenter\Builder;


class ModelBuilder extends Builder
{
    public function forModel($model)
    {
        $this->presenter->setModel($model);
        return $this;
    }
}