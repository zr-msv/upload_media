<?php

namespace Zm\PolymorphicMedia;

use Illuminate\Support\ServiceProvider;

class PolymorphicMediaServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function register(): void
    {
        //
    }
}
