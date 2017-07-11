<?php

namespace Oilstone\KeyValue;

use Oilstone\KeyValue\Presenters\Categorized;
use Oilstone\KeyValue\Presenters\Category;
use Oilstone\KeyValue\Presenters\KeyValue;
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