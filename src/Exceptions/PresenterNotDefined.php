<?php


namespace dominikpn\Presenter\Exceptions;


class PresenterNotDefined extends \Exception
{
    protected $message = 'First you must define presenter.';
}