<?php

namespace Zm\PolymorphicMedia;

use Illuminate\Support\ServiceProvider;
use Zm\PolymorphicMedia\Models\Media;
use Zm\PolymorphicMedia\Observers\MediaObserver;

class PolymorphicMediaServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        Media::observe(MediaObserver::class);

    }

    public function register(): void
    {
        //
    }
}
