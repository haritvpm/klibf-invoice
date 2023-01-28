<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Collection::macro('transpose', function () {
            $items = array_map(function (...$items) {
                return $items;
            }, ...$this->values());

            return new static($items);
        });

        // transpose(['name', 'email'])
        Collection::macro('transpose', function($keys = null) {
            $keys = $keys ?: range(0, $this->count() - 1);
        
            $items = array_map(function(...$items) use ($keys) {
                return array_combine($keys, $items);
            }, ...$this->values());
        
            return new self($items);
        });
    }
}
