<?php
namespace dominikpn\Presenter;


use Illuminate\Support\ServiceProvider;

class ModelPresenterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
           __DIR__.'/../config/config.php' => config_path('modelPresenter.php')
        ],'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'modelPresenter'
        );
    }
}