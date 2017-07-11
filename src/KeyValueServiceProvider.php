<?php

namespace Oilstone\KeyValues;

use Oilstone\KeyValues\Presenters\Categorized;
use Oilstone\KeyValues\Presenters\Category;
use Oilstone\KeyValues\Presenters\KeyValue;
use Oilstone\Presenter\Factory as Presenter;
use Illuminate\Support\ServiceProvider;

/**
 * Class KeyValueServiceProvider
 * @package App\Packages\KeyValues
 */
class KeyValueServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Presenter::macro('keyValues', function($collection) {
            return new Categorized($collection);
        });

        Presenter::macro('category', function($collection) {
            return new Category($collection);
        });

        Presenter::macro('keyValue', function($keyValue) {
            return new KeyValue($keyValue);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}